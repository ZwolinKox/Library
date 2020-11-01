<?php
// source: ./views/register.latte

use Latte\Runtime as LR;

final class Template309df8e620 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
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
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		$this->parentName = 'layouts/layout.latte';
		
	}


	public function blockContent(array $_args): void
	{
		extract($_args);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light">
                <div class="card-header">Zarejestruj</div>

                <div class="card-body">
                    <form method="POST" action="./register">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa użytkownika</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php
		if (isset($errorName)) {
			?> is-invalid <?php
		}
?>" name="name" required autocomplete="name" autofocus>

<?php
		if (isset($errorName)) {
?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo LR\Filters::escapeHtmlText($errorName) /* line 20 */ ?></strong>
                                    </span>
<?php
		}
?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adres email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php
		if (isset($errorEmail)) {
			?> is-invalid <?php
		}
?>" name="email" required autocomplete="email">

<?php
		if (isset($errorEmail)) {
?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo LR\Filters::escapeHtmlText($errorEmail) /* line 34 */ ?></strong>
                                    </span>
<?php
		}
?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php
		if (isset($errorPassword)) {
			?> is-invalid <?php
		}
?>" name="password" required autocomplete="new-password">

<?php
		if (isset($errorPassword)) {
?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo LR\Filters::escapeHtmlText($errorPassword) /* line 48 */ ?></strong>
                                    </span>
<?php
		}
?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Potwierdź hasło</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control <?php
		if (isset($errorSecondPassword)) {
			?> is-invalid <?php
		}
?>" name="password_confirmation" required autocomplete="new-password">

<?php
		if (isset($errorSecondPassword)) {
?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo LR\Filters::escapeHtmlText($errorSecondPassword) /* line 62 */ ?></strong>
                                    </span>
<?php
		}
?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-7">
                                <button type="submit" class="btn btn-outline-primary">
                                    Zarejestruj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	}

}
