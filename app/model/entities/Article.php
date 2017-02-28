<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author ml
 */

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Article extends \Kdyby\Doctrine\Entities\BaseEntity {

    /**
     * Sloupec pro ID článku.
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * Sloupec pro titulek článku.
     * @ORM\Column(type="string", length=200)
     */
    protected $title;

    /**
     * Sloupec pro text článku.
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * Sloupec, který udává, zda byl článek již zveřejněn, či nikoliv.
     * @ORM\Column(type="boolean")
     */
    protected $released;

    /**
     * Sloupec pro datum zveřejnění článku.
     * @ORM\Column(name="`released_date`", type="datetime")
     */
    protected $releasedDate;

    /**
     * URL článku.
     * @ORM\Column(name="`url`", type="string")
     */
    protected $url;

    /**
     * Vazba článku N:1 na uživatele.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="articles", cascade={"persist"})
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    protected $author;

}
