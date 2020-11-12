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
		?>Strona główna<?php
	}


	public function blockContent(array $_args): void
	{
?><div class="container  px-5">
    <div class="card-deck mb-3">
        <a href="./books" class="card border-secondary text-center my-card my-card-link">
            <div class="card-body">
                <i class="fas fa-book"></i>
                <h4 class="card-title">KSIĄŻKI</h4>
            </div>
        </a>
        <a href="./readers" class="card border-secondary text-center my-card my-card-link">
            <div class="card-body">
                <i class="fas fa-users"></i>
                <h4 class="card-title">CZYTELNICY</h4>
            </div>
        </a>
        <a href="./authors" class="card border-secondary text-center my-card my-card-link">
            <div class="card-body">
                <i class="fas fa-pen-alt"></i>
                <h4 class="card-title">AUTORZY</h4>
            </div>
        </a>
    </div>
    <div class="card-deck">
        <a href="./loans" class="card border-secondary text-center my-card my-card-link">
            <div class="card-body">
                <i class="fas fa-clock"></i>
                <h4 class="card-title">WYPOŻYCZENIA</h4>
            </div>
        </a>
        <a href="./employees" class="card border-secondary text-center my-card my-card-link">
            <div class="card-body">
                <i class="fas fa-briefcase"></i>
                <h4 class="card-title">PRACOWNICY</h4>
            </div>
        </a>

    </div>
</div>
<?php
	}

}
