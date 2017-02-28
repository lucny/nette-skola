<?php
// source: C:\xampp\htdocs\nette-skola\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template754fea469d extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'title' => 'blockTitle',
		'scripts' => 'blockScripts',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content' => 'html',
		'title' => 'html',
		'scripts' => 'html',
		'head' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('scripts', get_defined_vars());
?>


<?php
		$this->renderBlock('head', get_defined_vars());
?>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['article'])) trigger_error('Variable $article overwritten in foreach on line 20, 29');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div id="banner">
<?php
		$this->renderBlock('title', get_defined_vars());
		?>        <p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:articles")) ?>">Articles</a><p>   
</div>

<div id="content">    
<h2>Uživatel</h2>    
<ul>
    <li>Uživatelské jméno: <?php echo LR\Filters::escapeHtmlText($user->username) /* line 12 */ ?></li>
    <li>Role: <?php echo LR\Filters::escapeHtmlText($user->role) /* line 13 */ ?></li>
    <li>Datum registrace: <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $user->registrationDate, '%d.%m.%Y')) /* line 14 */ ?></li>
    <li>Informace: <?php echo LR\Filters::escapeHtmlText(implode($user->info,";")) /* line 15 */ ?></li>
</ul>
<h3>Fotka</h3>
<img src="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->datastream, stream_get_contents($user->photo))) /* line 18 */ ?>" alt="<?php
		echo LR\Filters::escapeHtmlAttr($user->info['jmeno'].' '.$user->info['prijmeni']) /* line 18 */ ?>" style="width:200px">
<h3>Články napsané uživatelem</h3>        
<?php
		$iterations = 0;
		foreach ($user->articles as $article) {
?>
    <article>    
        <h4><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $article->title)) /* line 22 */ ?></h4>
        <p><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $article->releasedDate, '%d.%m.%Y')) /* line 23 */ ?><p>   
    </article>
    <hr>    
<?php
			$iterations++;
		}
?>

<h3>Články</h3>        
<?php
		$iterations = 0;
		foreach ($articles as $article) {
?>
    <article>    
        <h4><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $article->title)) /* line 31 */ ?></h4>
        <p><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $article->releasedDate, '%d.%m.%Y')) /* line 32 */ ?><p>   
        <p><?php echo LR\Filters::escapeHtmlText($article->author->getInfo()['prijmeni']) /* line 33 */ ?><p>   
        <p><img src="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->datastream, stream_get_contents($article->author->getPhoto()))) /* line 34 */ ?>" alt="<?php
			echo LR\Filters::escapeHtmlAttr($article->author->getInfo()['prijmeni']) /* line 34 */ ?>" style="width:200px;"></p>
    </article>
    <hr>    
<?php
			$iterations++;
		}
?>

</div>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>	<h1>Články</h1>
<?php
	}


	function blockScripts($_args)
	{
		extract($_args);
		$this->renderBlockParent('scripts', get_defined_vars());
		
	}


	function blockHead($_args)
	{
		
	}

}
