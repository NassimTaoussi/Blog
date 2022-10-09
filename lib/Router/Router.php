<?php

    namespace NTaoussi\Lib\Router;

    use NTaoussi\Lib\Exception\AccessDeniedException;
    use NTaoussi\Lib\Controller\Controller;

class Router {

    private string $url;
    private array $routes = [];

    public function __construct(string $url) {
       $this->url = trim($url, '/');
    }

    public function get(string $path, string $action) {
            $this->routes['GET'][] = new Route($path, $action);
    }

    public function post(string $path, string $action) {
        $this->routes['POST'][] = new Route($path, $action);
    }

    public function run() {
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                    $route->execute();    
            }
        }
        return header('HTTP/1.0 404 Not Found');
    }
 }

?>