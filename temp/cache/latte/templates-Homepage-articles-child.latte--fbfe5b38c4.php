<?php
// source: C:\xampp\htdocs\nette-skola\app\presenters\templates\Homepage\articles-child.latte

use Latte\Runtime as LR;

class Templatefbfe5b38c4 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
	<article>    
            <h4><?php echo LR\Filters::escapeHtmlText($clanek->title) /* line 4 */ ?></h4>
            <p><?php echo LR\Filters::escapeHtmlText($clanek->content) /* line 5 */ ?><p>   
            <p><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $clanek->releasedDate, '%d.%m.%Y')) /* line 6 */ ?><p>   
            <p><?php echo LR\Filters::escapeHtmlText($clanek->author->getInfo()['prijmeni']) /* line 7 */ ?><p>   
            <p><img src="<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->datastream, stream_get_contents($clanek->author->getPhoto()))) /* line 8 */ ?>" alt="<?php
		echo LR\Filters::escapeHtmlAttr($clanek->author->getInfo()['prijmeni']) /* line 8 */ ?>" style="width:200px;"></p>
        </article>    
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
