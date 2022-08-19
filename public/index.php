<?php
    session_start();
    require '../vendor/autoload.php';

    use NTaoussi\Lib\Router\Router;

    define('ROOT', dirname(__DIR__));

    $router = new Router($_SERVER['REQUEST_URI']);


    $router->get('/', 'NTaoussi\Src\Controller\BlogController@index');
    $router->post('/', 'NTaoussi\Src\Controller\BlogController@index');
    
    $router->get('/posts', 'NTaoussi\Src\Controller\BlogController@posts');

    $router->get('/posts/:id', 'NTaoussi\Src\Controller\BlogController@showPost');
    $router->post('/posts/:id', 'NTaoussi\Src\Controller\BlogController@showPost');

    $router->get('/register', 'NTaoussi\Src\Controller\BlogController@register');
    $router->post('/register', 'NTaoussi\Src\Controller\BlogController@register');

    $router->get('/signin', 'NTaoussi\Src\Controller\BlogController@signIn');
    $router->post('/signin', 'NTaoussi\Src\Controller\BlogController@signIn');

    //Admin
    
    $router->get('/postsList', 'NTaoussi\Src\Controller\AdminController@postsList');
    $router->post('/postsList', 'NTaoussi\Src\Controller\AdminController@postsList');

    $router->get('/commentsList', 'NTaoussi\Src\Controller\AdminController@commentsList');
    $router->post('/commentsList', 'NTaoussi\Src\Controller\AdminController@commentsList');

    $router->get('/addPost', 'NTaoussi\Src\Controller\AdminController@addPost');
    $router->post('/addPost', 'NTaoussi\Src\Controller\AdminController@addPost');

    $router->run();

?>