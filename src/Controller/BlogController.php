<?php

namespace NTaoussi\Src\Controller;

use NTaoussi\Src\Service\ContactFormValidator;
use NTaoussi\Src\Service\CommentFormValidator;
use NTaoussi\Src\Repository\ArticleRepository as ArticleRepository;
use NTaoussi\Lib\Controller\Controller as Controller;
use NTaoussi\Src\Model\Comment;
use NTaoussi\Src\Model\User;
use NTaoussi\Src\Repository\CommentRepository;
use NTaoussi\Src\Repository\UserRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class BlogController extends Controller {

    public function index() {

        if(isset($_SESSION['user'])) {
            $token = md5(uniqid(rand(), true));
            $_SESSION['user']['token'] = $token;
        }

       $errors = [];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
                    $form = new ContactFormValidator();
                    $errors = $form->validate($_POST);

                    if (empty($errors)) {
                        try {
                            // Tentative de création d’une nouvelle instance de la classe PHPMailer
                            $mail = new PHPMailer (true);
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = "nassim.taoussi@gmail.com";
                            $mail->Password = "frluxawautxzygxg";
                            $mail->SMTPSecure = 'ssl';
                            $mail->Port = 465;

                            $mail->setFrom($_POST['contactEmail']);
                            $mail->addAddress('nassim.taoussi@gmail.com');
                            $mail->isHTML(true);
                            $mail->Body = $_POST['contactMessage'];

                            $mail->send();

                        // (…)
                        } catch (\Exception $e) {
                                echo "Erreur : ".$mail->ErrorInfo;
                        }               
                        $this->redirect('/');
                        $this->setFlash('Votre message a bien été envoyer', 'success');
                    }
            
        }

        $this->render("home.html.twig", [
            'errors' => $errors,
        ]);
       
    }

    public function posts() {      
        $articleRepository = new ArticleRepository();
        // Récupérer le nombre d'enregistrements
        $totalArticles = $articleRepository->findTotal();

        $nbrElementsByPage = 4;
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

    public function showPost($id) {
        $articleRepository = new ArticleRepository();
        $commentRepository = new CommentRepository();

        $article = $articleRepository->findOneById((int)$id);

        // Récupérer le nombre d'enregistrements
        $totalComments = $commentRepository->findTotalCommentsByArticle($id, 1);

        $nbrElementsByPage = 5;
        $nbrOfPages = ceil($totalComments / $nbrElementsByPage);
        $page = (int)($_GET['page'] ?? 1);
        $start = ($page - 1) * $nbrElementsByPage;
    
        // Récupérer les enregistrements eux-mêmes
        $comments = $commentRepository->findCommentsByArticle($start, $nbrElementsByPage, $id);
    
        //Soumettre un commentaire
        $errors= [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['csrf_token']))
            {
                if($_POST['csrf_token'] == $_SESSION['user']['token'])
                {
                    $form = new CommentFormValidator();
                    $errors = $form->validate($_POST);

                    if (empty($errors)) {
                        $dateNow = new \DateTime('now');
                        $dateNow->setTimezone(new \DateTimeZone('UTC'));
                    
                        
                        $comment = new Comment(null, $_SESSION['user']['id'],  $_SESSION['user']['username'], $dateNow , $_POST['content'], 0, $article->getId());
                        $commentRepository->insertComment($comment);
                        $this->redirect('/posts/' . $_POST['id']);
                    }
                }
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