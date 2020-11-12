<?php
// source: ./views/authors.latte

use Latte\Runtime as LR;

final class Templatebe433de866 extends Latte\Runtime\Template
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
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['element' => '28'], $this->params) as $_v => $_l) {
				trigger_error("Variable \$$_v overwritten in foreach on line $_l");
			}
		}
		$this->parentName = 'layouts/layout.latte';
		
	}


	public function blockTitle(array $_args): void
	{
		?>Autorzy<?php
	}


	public function blockContent(array $_args): void
	{
		extract($_args);
?>

    <div class="container body-content">
    <button type="button" class="btn btn-primary" style="margin: 15px" onclick="location.href='./home'">Wróć do menu</button>
        <div class="page-header">
            <label class="heading">Autorzy</label>
            
            <div class="form-group">
                <fieldset>
                    <form action="" class="form-group" method="post">
                        <div class="table-responsive">
                            <div class="table-responsive">                            
                                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%" data-toggle="table" data-locale="pl-PL">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imie</th>
                                            <th>Nazwisko</th>
                                            <th>Akcja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
		$iterations = 0;
		foreach ($authors as $element) {
?>
                                                <tr>
                                                    <td><?php echo LR\Filters::escapeHtmlText($element->id) /* line 30 */ ?></td>
                                                    <td><?php echo LR\Filters::escapeHtmlText($element->first_name) /* line 31 */ ?></td>
                                                    <td><?php echo LR\Filters::escapeHtmlText($element->last_name) /* line 32 */ ?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group inline">
                                                            <button type="button" class="btn btn-success"><i class="fas fa-edit" style="font-size: 16px"></i>Edytuj</button>
                                                            <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt" style="font-size: 16px"></i>Usuń</button>
                                                        </div>
                                                    </td>
                                                </tr>
<?php
			$iterations++;
		}
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
            <hr>
        </div>
    </div>
    

<?php
	}

}
