<?php

namespace NTaoussi\App\Src\Controllers;

class BlogController {

    public function index() {
        echo('Je suis la page d\'accueil');
    }

    public function showPost(int $id) {
        echo('Je suis le post n°' . $id);
    }
}

?>