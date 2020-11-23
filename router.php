<?php

namespace Library;
use Exception;

require_once __DIR__ . '/vendor/autoload.php';

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

use Library\Auth\Auth;

session_start();
$router = new RouteCollector();

$router->filter('auth', function() {    
    if(!Auth::isLogin()) {
        header('Location: ./login');
        return false;
    }
});

$router->filter('guest', function() {    
    if(Auth::isLogin()) {
        header('Location: ./home');
        return false;
    }
});

//404
$router->group(['prefix' => 'library', 'before' => 'auth'], function ($router) {
    $router->get('/404', function() {
        return '<h1>Error: 404 </h1>';
    });
});

//Routing wymagający zalogowania się
$router->group(['prefix' => 'library', 'before' => 'auth'], function ($router) {
    $router->get('/home', ['Library\Controllers\HomeController', 'home']);
    $router->get('/logout', ['Library\Controllers\AuthController', 'logout']);

    $router->get('/books', ['Library\Controllers\BookController', 'books']);
    $router->post('/books', ['Library\Controllers\BookController', 'newBook']);
    $router->post('/books/edit/{id}', ['Library\Controllers\BookController', 'editBook']);
    $router->get('/books/delete/{id}', ['Library\Controllers\BookController', 'deleteBook']);

    $router->get('/readers', ['Library\Controllers\ReaderController', 'readers']);
    $router->post('/readers', ['Library\Controllers\ReaderController', 'newReader']);
    $router->post('/readers/edit/{id}', ['Library\Controllers\ReaderController', 'editReader']);
    $router->get('/readers/delete/{id}', ['Library\Controllers\ReaderController', 'deleteReader']);

    $router->get('/authors', ['Library\Controllers\AuthorController', 'authors']);
    $router->post('/authors', ['Library\Controllers\AuthorController', 'newAuthor']);
    $router->post('/authors/edit/{id}', ['Library\Controllers\AuthorController', 'editAuthor']);
    $router->get('/authors/delete/{id}', ['Library\Controllers\AuthorController', 'deleteAuthor']);

    $router->get('/loans', ['Library\Controllers\LoanController', 'loans']);
    $router->post('/loans', ['Library\Controllers\LoanController', 'newLoan']);
    $router->post('/loans/edit/{id}', ['Library\Controllers\LoanController', 'editLoan']);
    $router->get('/loans/delete/{id}', ['Library\Controllers\LoanController', 'deleteLoan']);

    $router->get('/employees', ['Library\Controllers\EmployeeController', 'employees']);
    $router->post('/employees', ['Library\Controllers\EmployeeController', 'newEmployee']);
    $router->post('/employees/edit/{id}', ['Library\Controllers\EmployeeController', 'editEmployee']);
    $router->get('/employees/delete/{id}', ['Library\Controllers\EmployeeController', 'deleteEmployee']);

});

//Routing wymagający bycia niezalogowanym
$router->group(['prefix' => 'library', 'before' => 'guest'], function ($router) {
    $router->get('/login', ['Library\Controllers\AuthController', 'login']);
    $router->get('/register', ['Library\Controllers\AuthController', 'register']);
    $router->post('/login', ['Library\Controllers\AuthController', 'loginUser']);
    $router->post('/register', ['Library\Controllers\AuthController', 'registerUser']);
});

$dispatcher = new Dispatcher($router->getData());

try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    echo $response;
}
catch(HttpRouteNotFoundException $e) {
    $dispatcher = new Dispatcher($router->getData());
    $response = $dispatcher->dispatch('GET', 'library/404');
    echo $response;
}


