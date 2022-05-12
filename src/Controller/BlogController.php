<?php

namespace NTaoussi\Src\Controller;

use NTaoussi\Src\Repository\ArticleRepository as ArticleRepository;
use NTaoussi\Lib\Controller\Controller as Controller;

class BlogController extends Controller {

    public function index() {
        $this->render("home.html.twig");
       
    }

    public function posts() {
        $articleRepository = new ArticleRepository();
        $allArticles = $articleRepository->findAll();
        $this->render("articles.html.twig", [
            'allArticles' => $allArticles,
        ]);
    }

    public function showPost(int $id) {
        echo('Je suis le post ' . $id);
    }
    
}

?>