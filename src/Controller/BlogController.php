<?php

namespace NTaoussi\Src\Controller;

use NTaoussi\Src\Repository\ArticleRepository as ArticleRepository;
use NTaoussi\Lib\Controller\Controller as Controller;
use NTaoussi\Src\Model\Comment;
use NTaoussi\Src\Repository\CommentRepository;

class BlogController extends Controller {

    public function index() {
        $this->render("home.html.twig");
       
    }

    public function posts() {      
        $articleRepository = new ArticleRepository();
        // Récupérer le nombre d'enregistrements
        $totalArticles = $articleRepository->findTotal();

        $nbrElementsByPage = 2;
        $nbrOfPages = ceil($totalArticles / $nbrElementsByPage);
        $page = (int)($_GET['page'] ?? 1);
        $start = ($page - 1) * $nbrElementsByPage;

        // Récupérer les enregistrements eux-mêmes
        $articles = $articleRepository->findPosts($start, $nbrElementsByPage);

        $this->render("articles.html.twig", [
            'articles' => $articles,
            'allPages' => $nbrOfPages,
            'page' => $page
        ]);
    }

    public function showPost(int $id) {
        $articleRepository = new ArticleRepository();
        $commentRepository = new CommentRepository();

        $article = $articleRepository->findOneById($id);

        // Récupérer le nombre d'enregistrements
        $totalComments = $commentRepository->findTotalComments();

        $nbrElementsByPage = 2;
        $nbrOfPages = ceil($totalComments / $nbrElementsByPage);
        $page = (int)($_GET['page'] ?? 1);
        $start = ($page - 1) * $nbrElementsByPage;

        // Récupérer les enregistrements eux-mêmes
        $comments = $commentRepository->findComments($start, $nbrElementsByPage);
    
        //Soumettre un commentaire

        dump($_POST);
        $errors= [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(empty($_POST['username'])) {
                $errors['username'] = "le pseudo est obligatoire";
            }

            if(empty($_POST['content'])) {
                $errors['content'] = "le contenu est obligatoire";
            }


            if (empty($errors)) {
                $dateNow = new \DateTime('now');
                $dateNow->setTimezone(new \DateTimeZone('UTC'));
            
                
                $comment = New Comment($_POST['username'], $dateNow , $_POST['content'], true);
                dump($comment);
                $commentRepository->insertComment(1, $comment->getDateOfPost(), $comment->getContent(), 1);
            }
        }

        $this->render("article_detail.html.twig", [
            'article' => $article,
            'comments' => $comments,
            'allPages' => $nbrOfPages,
            'page' => $page,
            'errors' => $errors
        ]);
    }

    
}

?>