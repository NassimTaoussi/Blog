<?php

namespace NTaoussi\Lib\Router;

class Route {

    private string $path;
    private string $action;
    private array $matches;

    public function __construct(
        string $path, 
        string $action
    ) {

        $this->path = trim($path, "/");
        $this->action = $action;
       
    }

    public function matches(string $url) {
        if(strpos($url, "?") !== false ) {
            $url = substr($url, 0, strpos($url, "?"));   
        }
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if(preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        } 
            return false;
        
    }

    public function execute() {
        $params = explode('@', $this->action);
        $controller = new $params[0]();
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
        
}

?>