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
    $router->get('/readers', ['Library\Controllers\ReaderController', 'readers']);
    $router->get('/authors', ['Library\Controllers\AuthorController', 'authors']);
    $router->get('/loans', ['Library\Controllers\LoanController', 'loans']);
    $router->get('/employees', ['Library\Controllers\EmployeeController', 'employees']);
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


