<?php

    require '../vendor/autoload.php';

    use NTaoussi\Lib\Router;

    define('ROOT', dirname(__DIR__));

    $router = new Router($_SERVER['REQUEST_URI']);


    $router->get('/', 'NTaoussi\Src\Controllers\BlogController@index');
    $router->get('/posts/:id', 'NTaoussi\Src\Controllers\BlogController@showPost');

    $router->run();

?>