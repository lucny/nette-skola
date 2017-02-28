<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class User extends \Kdyby\Doctrine\Entities\BaseEntity
{
	// Pomocné konstanty pro náš model.

	/** Konstanty pro uživatelské role. */
	const ROLE_USER = 1,
	      ROLE_ADMIN = 2;

	/** Konstanty pro uživatelské jméno. */
	const MAX_NAME_LENGTH = 15,
	      NAME_FORMAT = "^[a-zA-Z0-9]*$";

	// Proměné reprezentující jednotlivé sloupce tabulky.

	/**
	 * Sloupec pro ID uživatele.
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;

	/**
	 * Sloupec pro uživatelské jméno.
	 * @ORM\Column(type="string")
	 */
	protected $username;

	/**
	 * Sloupec pro heslo.
	 * @ORM\Column(type="string")
	 */
	protected $password;

	/**
	 * Sloupec pro email.
	 * @ORM\Column(type="string")
	 */
	protected $email;

	/**
	 * Sloupec pro datum registrace.
	 * @ORM\Column(name="`registration_date`", type="datetime")
	 */
	protected $registrationDate;

	/**
	 * Sloupec role uživatele.
         * @ORM\Column(type="string", columnDefinition="ENUM('administrator', 'redaktor')")
	 */
	protected $role;
        
	/** 
         * Sloupec pro uložení fotky uživatele.
         * @ORM\Column(type="blob") 
         */
	protected $photo;        

	/** 
         * Sloupec pro uložení informací o uživateli ve formátu JSON.
         * @ORM\Column(type="json_array") 
         */
	protected $info;        

        /**
	 * Namapovaná vazba uživatele 1:N na tabulku článků.
	 * @ORM\OneToMany(targetEntity="Article", mappedBy="author", cascade={"persist"})
	 */
	protected $articles;
    
    /** Konstruktor s inicializací objektů pro vazby mezi entitami. */
	public function __construct()
	{
		parent::__construct();
		$this->articles = new ArrayCollection();
	}

	/**
	 * Ověřuje, zda je uživatel v roli administrátora.
	 * @return bool vrací true, pokud je uživatel administrátor; jinak vrací false
	 */
	public function isAdmin()
	{
		return $this->role === self::ROLE_ADMIN;
	}

	/**
	 * Přidá nový článek do seznamu daného uživatele.
	 * @param Article $article nový článek
	 */
	public function addArticle(Article $article)
	{
		$this->articles[] = $article;
		$article->user = $this;
	}    

        public function getUsername() {
            return $this->username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getRegistrationDate() {
            return $this->registrationDate;
        }

        public function getRole() {
            return $this->role;
        }

        public function getInfo() {
            return $this->info;
        }

        public function getPhoto() {
            return $this->photo;
        }        
}
