<?php

    require '../vendor/autoload.php';

    use NTaoussi\Lib\Router;

    echo('Hello !');

    $router = new Router($_SERVER['REQUEST_URI']);

    $router->get('/', 'NTaoussi\App\Src\Controllers\BlogController@index');
    $router->get('/posts/:id', 'NTaoussi\App\Src\Controllers\BlogController@showPost');

?>