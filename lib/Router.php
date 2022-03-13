<?php

    namespace NTaoussi\App\Lib;

    class Router {

        public $url;
        public $routes = [];

        public function __construct($url) {
            $this->url = $url;
        }

        public function get(string $path, string $action) {
            
        }
    }

?>