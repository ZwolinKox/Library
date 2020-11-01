<?php
// source: ./views/home.latte

use Latte\Runtime as LR;

final class Template0cc63d5bbf extends Latte\Runtime\Template
{
	public $blocks = [
		'title' => 'blockTitle',
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'title' => 'html',
		'content' => 'html',
	];


	public function main(): array
	{
		extract($this->params);
?>

<?php
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars());
?>

<?php
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		$this->parentName = 'layouts/layout.latte';
		
	}


	public function blockTitle(array $_args): void
	{
		?>First page<?php
	}


	public function blockContent(array $_args): void
	{
?><p>Lorem Gypsum...</p>

<?php
		if (Library\Auth\Auth::isLogin()) {
			?>    Zalogowany <?php echo LR\Filters::escapeHtmlText(Library\Auth\Auth::user()->name) /* line 8 */ ?>

<?php
		}
		else {
?>
        Nie zalogowano
<?php
		}
?>

<?php
	}

}
