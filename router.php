<?php

namespace Library;

require_once __DIR__ . '/vendor/autoload.php';

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

use Library\Auth\Auth;

session_start();
$router = new RouteCollector();


$router->group(['prefix' => 'library'], function ($router) {
    $router->get('/home', ['Library\Controllers\HomeController', 'home']);

    $router->get('/login', ['Library\Controllers\AuthController', 'login']);
    $router->get('/register', ['Library\Controllers\AuthController', 'register']);

    $router->get('/logout', function() {
        Auth::logout();
    });
});


$dispatcher = new Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
echo $response;
