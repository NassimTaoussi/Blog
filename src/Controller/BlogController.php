<?php

namespace NTaoussi\Src\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BlogController {

    private $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(ROOT.'/template');

        $this->twig = new Environment($this->loader);
    }


    public function index() {
        $this->twig->display("home.html.twig");
       
    }

    public function showPost(int $id) {
        echo('Je suis le post ' . $id);
    }
}

?>