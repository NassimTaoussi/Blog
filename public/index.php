<?php

    require '../vendor/autoload.php';

    use NTaoussi\Lib\Router;

    $router = new Router($_GET['url']);

    $router->get('/', 'NTaoussi\App\Controllers\BlogController@index');
    $router->get('/posts/:id', 'NTaoussi\App\Controllers\BlogController@showPost');

?>