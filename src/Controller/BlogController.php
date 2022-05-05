<?php

namespace NTaoussi\Src\Controller;

class BlogController extends Controller {

    public function index() {
        $this->twig->display("home.html.twig");
       
    }

    public function showPost(int $id) {
        echo('Je suis le post ' . $id);
    }
}

?>