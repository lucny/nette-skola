<?php
// source: C:\xampp\htdocs\nette-skola\app\presenters/templates/Homepage/articles.latte

use Latte\Runtime as LR;

class Template19630bf8ce extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'title' => 'blockTitle',
		'_clanek' => 'blockClanek',
		'_wrapper' => 'blockWrapper',
		'scripts' => 'blockScripts',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content' => 'html',
		'title' => 'html',
		'_clanek' => 'html',
		'_wrapper' => 'html',
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
		if (isset($this->params['article'])) trigger_error('Variable $article overwritten in foreach on line 10, 15');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div id="banner">
<?php
		$this->renderBlock('title', get_defined_vars());
?>
</div>

<div id="content">       
    <h3>AJAX seznam</h3>
<?php
		$iterations = 0;
		foreach ($articles as $article) {
			?>        <h4><a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeArticle!", [$article->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($article->title) /* line 11 */ ?></a></h4>
<?php
			$iterations++;
		}
?>
    <hr>    
    <h3>Dialog seznam</h3>
<?php
		$iterations = 0;
		foreach ($articles as $article) {
			?>        <h4><a class="ajax dialog-open" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeArticle!", [$article->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($article->title) /* line 16 */ ?></a></h4>
<?php
			$iterations++;
		}
?>
    
<h2>Ajax</h2>
    <h3>Aktuální článek (1 metoda)</h3>
        <div id="dialog" title="Článek">
<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('clanek')) ?>"><?php $this->renderBlock('_clanek', $this->params) ?></div>        </div>
    <hr>
    <h3>Snippet v šabloně</h3>
<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('wrapper')) ?>"><?php $this->renderBlock('_wrapper', $this->params) ?></div></div>
       
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>	<h1>Články</h1>
<?php
	}


	function blockClanek($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("clanek", "static");
?>
	<article>    
            <h4><?php echo LR\Filters::escapeHtmlText($clanek->title) /* line 24 */ ?></h4>
            <p><?php echo LR\Filters::escapeHtmlText($clanek->content) /* line 25 */ ?><p>   
            <p><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $clanek->releasedDate, '%d.%m.%Y')) /* line 26 */ ?><p>   
            <p><?php echo LR\Filters::escapeHtmlText($clanek->author->getInfo()['prijmeni']) /* line 27 */ ?><p>   
            <p><img src="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->datastream, stream_get_contents($clanek->author->getPhoto()))) /* line 28 */ ?>" alt="<?php
		echo LR\Filters::escapeHtmlAttr($clanek->author->getInfo()['prijmeni']) /* line 28 */ ?>" style="width:200px;"></p>
        </article>    
<?php
		$this->global->snippetDriver->leave();
		
	}


	function blockWrapper($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("wrapper", "static");
		/* line 35 */
		$this->createTemplate('articles-child.latte', $this->params, "include")->renderToContentType('html');
		$this->global->snippetDriver->leave();
		
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
