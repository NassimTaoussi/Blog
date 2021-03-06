<?php

    require '../vendor/autoload.php';

    use NTaoussi\Lib\Router\Router;

    define('ROOT', dirname(__DIR__));

    $router = new Router($_SERVER['REQUEST_URI']);


    $router->get('/', 'NTaoussi\Src\Controller\BlogController@index');
    
    $router->get('/posts', 'NTaoussi\Src\Controller\BlogController@posts');

    $router->get('/posts/:id', 'NTaoussi\Src\Controller\BlogController@showPost');
    $router->post('/posts/:id', 'NTaoussi\Src\Controller\BlogController@showPost');

    $router->get('/register', 'NTaoussi\Src\Controller\BlogController@register');
    $router->post('/register', 'NTaoussi\Src\Controller\BlogController@register');

    $router->get('/signin', 'NTaoussi\Src\Controller\BlogController@signIn');
    $router->post('/signin', 'NTaoussi\Src\Controller\BlogController@signIn');

    $router->run();

?>