<?php

    require '../vendor/autoload.php';

    use NTaoussi\Lib\Router;

    $router = new Router($_SERVER['REQUEST_URI']);

    $router->get('/', 'NTaoussi\App\Controllers\BlogController@index');
    $router->get('/posts/:id', 'NTaoussi\App\Controllers\BlogController@showPost');

?>