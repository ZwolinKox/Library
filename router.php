<?php

namespace Library;

require_once __DIR__ . '/vendor/autoload.php';

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;
$router = new RouteCollector();


$router->group(['prefix' => 'zwolinskiBiblioteka'], function ($router) {
    
    $router->get('/zwolin', ['Library\Controllers\Home', 'zwolin']);

});


$dispatcher = new Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
echo $response;
