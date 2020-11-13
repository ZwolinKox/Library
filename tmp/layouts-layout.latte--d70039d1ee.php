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
<!doctype html>
<html lang="pl" class="no-js">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer/">
    <link rel="stylesheet" href="./resources/css/lux.css">
    <link rel="stylesheet" href="./resources/css/app.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css">

    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>   
    <script defer src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>   
    <script defer src="https://kit.fontawesome.com/0f41993dae.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script defer src="./resources/js/table.js"></script>
    <script src="./resources/js/loading.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table-locale-all.min.js"></script>
    


    <title><?php
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars());
?> | Biblioteka</title>
  </head>
  <body>
        <div class="se-pre-con"></div>
        <div id="app" class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <div class="container">
                <a class="navbar-brand" href="./home">
                    Biblioteka
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
<?php
		if (!Library\Auth\Auth::isLogin()) {
?>
                            <li class="nav-item">
                            <a class="nav-link" href="./login">Logowanie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./register">Rejestracja</a>
                            </li>
<?php
		}
?>
                        
<?php
		if (Library\Auth\Auth::isLogin()) {
?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo LR\Filters::escapeHtmlText(Library\Auth\Auth::user()->name) /* line 61 */ ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./logout">
                                    Wyloguj się
                                </a>
                            </div>
                        </li>
<?php
		}
?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php
		$this->renderBlock('content', get_defined_vars());
?>
        </main>
        
        <footer class="fixed-bottom text-center bg-dark text-white">
                <p style="margin-top: 25px;">Biblioteka 2020 &copy;</p>
        </footer>
    </div>
  </body>
</html>
<?php
		return get_defined_vars();
	}


	public function blockTitle(array $_args): void
	{
		
	}


	public function blockContent(array $_args): void
	{
		
	}

}
