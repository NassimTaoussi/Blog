<?php

namespace NTaoussi\Src\Controller;

use NTaoussi\Lib\Controller\Controller as Controller;

class BlogController extends Controller {

    public function index() {
        $this->render("home.html.twig");
       
    }

    public function showPost(int $id) {
        echo('Je suis le post ' . $id);
    }
}

?>