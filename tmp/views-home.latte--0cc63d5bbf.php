<?php
// source: ./views/home.latte

use Latte\Runtime as LR;

final class Template0cc63d5bbf extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo LR\Filters::escapeHtmlText(isset($cond) ? 'hello' : null) /* line 1 */ ?>


<h3>Witaj na mojej stronie</h3><?php
		return get_defined_vars();
	}

}
