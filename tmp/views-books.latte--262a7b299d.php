<?php
// source: ./views/books.latte

use Latte\Runtime as LR;

final class Template262a7b299d extends Latte\Runtime\Template
{
	public $blocks = [
		'title' => 'blockTitle',
		'content' => 'blockContent',
		'script' => 'blockScript',
	];

	public $blockTypes = [
		'title' => 'html',
		'content' => 'html',
		'script' => 'html',
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
?>
    
<?php
		$this->renderBlock('script', get_defined_vars());
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['element' => '26, 77, 112'], $this->params) as $_v => $_l) {
				trigger_error("Variable \$$_v overwritten in foreach on line $_l");
			}
		}
		$this->parentName = 'layouts/layout.latte';
		
	}


	public function blockTitle(array $_args): void
	{
		?>Książki<?php
	}


	public function blockContent(array $_args): void
	{
		extract($_args);
?>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edytuj książkę</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="editForm" action="./books/edit/1">
                <div class="form-group">
                    <label for="bookName" class="col-form-label">Nazwa książki:</label>
                    <input type="text" class="form-control" name="bookName" id="bookName">
                </div>
                <div class="form-group">
                    <label for="authorId" class="col-form-label">Autor</label>
                    <select name="authorId" id="authorId" class="form-control">
<?php
		$iterations = 0;
		foreach ($authors as $element) {
			?>                            <option value="<?php echo LR\Filters::escapeHtmlAttr($element->id) /* line 27 */ ?>"><?php
			echo LR\Filters::escapeHtmlText($element->first_name) /* line 27 */ ?> <?php echo LR\Filters::escapeHtmlText($element->last_name) /* line 27 */ ?></option>
<?php
			$iterations++;
		}
?>
                    </select>
                </div>                      
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Czy na pewno chcesz usunąć książkę <span id="deleteBookName"></span> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <button type="submit" class="btn btn-md btn-danger" id="deleteBookHref">Tak</button>
                <button type="button" class="btn btn-md btn-primary" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Nie</button>
            </div>
        </div>
    </div>
    </div>

    
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newModalLabel">Nowa książka</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form method="POST" id="newForm" action="./books">
                <div class="form-group">
                    <label for="bookName" class="col-form-label">Nazwa książki:</label>
                    <input type="text" class="form-control" name="bookName" id="newBookName">
                </div>
                <div class="form-group">
                    <label for="authorId" class="col-form-label">Autor</label>
                    <select name="authorId" id="newAuthorId" class="form-control">
<?php
		$iterations = 0;
		foreach ($authors as $element) {
			?>                            <option value="<?php echo LR\Filters::escapeHtmlAttr($element->id) /* line 78 */ ?>"><?php
			echo LR\Filters::escapeHtmlText($element->first_name) /* line 78 */ ?> <?php echo LR\Filters::escapeHtmlText($element->last_name) /* line 78 */ ?></option>
<?php
			$iterations++;
		}
?>
                    </select>
                </div>                      
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-primary">Dodaj książkę</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <div class="container body-content">
    <button type="button" class="btn btn-primary" style="margin: 15px" onclick="location.href='./home'">Wróć do menu</button>
        <div class="page-header">
            <label class="heading">Książki</label>
            <div class="form-group">
                <fieldset>
                    <form action="" class="form-group" method="post">
                        <div class="table-responsive">
                            <div class="table-responsive">     
                                <button type="button" class="float-right btn btn-primary" data-target="#newModal" data-toggle="modal" style="margin: 15px">Dodaj książke</button>                       
                                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%" data-toggle="table" data-locale="pl-PL">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nazwa</th>
                                            <th>Autor</th>
                                            <th>Akcja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
		$iterations = 0;
		foreach ($books as $element) {
?>
                                                <tr>
                                                    <td><?php echo LR\Filters::escapeHtmlText($element->id) /* line 114 */ ?></td>
                                                    <td><?php echo LR\Filters::escapeHtmlText($element->name) /* line 115 */ ?></td>
                                                    <td><?php echo LR\Filters::escapeHtmlText($element->author_first_name) /* line 116 */ ?> <?php
			echo LR\Filters::escapeHtmlText($element->author_last_name) /* line 116 */ ?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group inline">
                                                            <button type="button" class="btn btn-success"><i class="fas fa-edit" style="font-size: 16px"  data-target="#editModal" data-toggle="modal" 
                                                                data-book-id="<?php echo LR\Filters::escapeHtmlAttr($element->id) /* line 120 */ ?>" data-book-name="<?php
			echo LR\Filters::escapeHtmlAttr($element->name) /* line 120 */ ?>"></i>Edytuj</button>
                                                            <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt" style="font-size: 16px" data-target="#deleteModal" data-toggle="modal"
                                                                data-book-id="<?php echo LR\Filters::escapeHtmlAttr($element->id) /* line 122 */ ?>" data-book-name="<?php
			echo LR\Filters::escapeHtmlAttr($element->name) /* line 122 */ ?>"></i>Usuń</button>
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


	public function blockScript(array $_args): void
	{
		extract($_args);
?>
    <script>
        $('#editModal').on('show.bs.modal', function(e) {
            const bookId = $(e.relatedTarget).data('book-id');
            const bookName = $(e.relatedTarget).data('book-name');
            
            $(e.currentTarget).find('form').attr('action', './books/edit/' + bookId);
            $(e.currentTarget).find('input[name="bookName"]').val(bookName);
        });

         $('#deleteModal').on('show.bs.modal', function(e) {
            const bookId = $(e.relatedTarget).data('book-id');
            const bookName = $(e.relatedTarget).data('book-name');
            
            $(e.currentTarget).find('#deleteBookName').text(bookName);
            $(e.currentTarget).find('#deleteBookHref').click(function() {
                location.href = "./books/delete/" + bookId;
            });
        });
    </script>
<?php
	}

}
