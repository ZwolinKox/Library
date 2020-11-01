<?php
// source: views\layouts\layout.latte

use Latte\Runtime as LR;

final class Templated70039d1ee extends Latte\Runtime\Template
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
<html>
	<head>
		<title><?php
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars());
?> | My web</title>
	</head>
	<body>
		<div id="sidebar">
			<ul>...</ul>
		</div>

		<div id="content"><?php
		$this->renderBlock('content', get_defined_vars());
?></div>
	</body>
</html><?php
		return get_defined_vars();
	}


	public function blockTitle(array $_args): void
	{
		
	}


	public function blockContent(array $_args): void
	{
		
	}

}
