<?php

namespace Library;

require_once __DIR__ . '/vendor/autoload.php';

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

use Library\Auth\Auth;

session_start();
$router = new RouteCollector();


$router->group(['prefix' => 'library'], function ($router) {
    $router->get('/zwolin', ['Library\Controllers\Home', 'zwolin']);
    $router->get('/home', ['Library\Controllers\Home', 'zwolin']);

    $router->get('/login', function() {
        Auth::login('zwolin2', 'zwolin2');
    });

    $router->get('/logout', function() {
        Auth::logout();
    });
});


$dispatcher = new Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
echo $response;
