<?php

namespace Library;

require_once __DIR__ . '/vendor/autoload.php';

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

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

//Routing wymagający zalogowania się
$router->group(['prefix' => 'library', 'before' => 'auth'], function ($router) {
    $router->get('/home', ['Library\Controllers\HomeController', 'home']);
    $router->get('/logout', ['Library\Controllers\AuthController', 'logout']);
});

//Routing wymagający bycia niezalogowanym
$router->group(['prefix' => 'library', 'before' => 'guest'], function ($router) {
    $router->get('/login', ['Library\Controllers\AuthController', 'login']);
    $router->get('/register', ['Library\Controllers\AuthController', 'register']);
    $router->post('/login', ['Library\Controllers\AuthController', 'loginUser']);
    $router->post('/register', ['Library\Controllers\AuthController', 'registerUser']);
});


$dispatcher = new Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
echo $response;
