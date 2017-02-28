<?php
// source: C:\xampp\htdocs\nette-skola\app\presenters/templates/Homepage/detailAjax.latte

use Latte\Runtime as LR;

class Templatecf0105b93b extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'_dialog' => 'blockDialog',
	];

	public $blockTypes = [
		'content' => 'html',
		'_dialog' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		?><div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('dialog')) ?>"><?php $this->renderBlock('_dialog', $this->params) ?></div><?php
		
	}


	function blockDialog($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("dialog", "static");
?>
    <div id="dialog" title="Článek">
	<article>    
            <h4><?php echo LR\Filters::escapeHtmlText($data->title) /* line 5 */ ?></h4>
            <p><?php echo LR\Filters::escapeHtmlText($data->content) /* line 6 */ ?><p>   
            <p><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $data->releasedDate, '%d.%m.%Y')) /* line 7 */ ?><p>   
            <p><?php echo LR\Filters::escapeHtmlText($data->author->getInfo()['prijmeni']) /* line 8 */ ?><p>   
            <p><img src="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->datastream, stream_get_contents($data->author->getPhoto()))) /* line 9 */ ?>" alt="<?php
		echo LR\Filters::escapeHtmlAttr($data->author->getInfo()['prijmeni']) /* line 9 */ ?>" style="width:200px;"></p>
        </article>    
    </div>   
<?php
		$this->global->snippetDriver->leave();
		
	}

}
