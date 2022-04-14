<?php

namespace NTaoussi\Lib;

class Route {

    public function __construct(
        public $path, 
        public $action
    ) {
       
    }

    public function matches(string $url) {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if(preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute() {
        $params = explode('@', $this->action);
        $controller = new $params['0']();
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
        
}

?>