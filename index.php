<?php

    use NTaoussi\App\Lib\Router;

    require 'vendor/autoload.php';

    $router = new Router($_GET['url']);

    $router->get('/', 'BlogController@index');
    $router->get('/posts/:id', 'BlogController@showPost');

?>