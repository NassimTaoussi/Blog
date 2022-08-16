<?php

namespace NTaoussi\Src\Controller;

use NTaoussi\Src\Service\LoginFormValidator;
use NTaoussi\Src\Service\RegisterFormValidator;
use NTaoussi\Src\Service\ContactFormValidator;
use NTaoussi\Src\Service\CommentFormValidator;
use NTaoussi\Src\Repository\ArticleRepository as ArticleRepository;
use NTaoussi\Lib\Controller\Controller as Controller;
use NTaoussi\Src\Model\Comment;
use NTaoussi\Src\Model\User;
use NTaoussi\Src\Repository\CommentRepository;
use NTaoussi\Src\Repository\UserRepository;

class BlogController extends Controller {

    public function index() {

       $errors = [];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = new ContactFormValidator();
            $errors = $form->validate($_POST);

            if (empty($errors)) {     

            
                $this->redirect('/');
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

    public function showPost($id) {
        $articleRepository = new ArticleRepository();
        $commentRepository = new CommentRepository();

        $article = $articleRepository->findOneById((int)$id);

        // Récupérer le nombre d'enregistrements
        $totalComments = $commentRepository->findTotalComments();

        $nbrElementsByPage = 2;
        $nbrOfPages = ceil($totalComments / $nbrElementsByPage);
        $page = (int)($_GET['page'] ?? 1);
        $start = ($page - 1) * $nbrElementsByPage;
    
        // Récupérer les enregistrements eux-mêmes
        $comments = $commentRepository->findComments($start, $nbrElementsByPage, $id);
    
        //Soumettre un commentaire
        $errors= [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $form = new CommentFormValidator();
            $errors = $form->validate($_POST);

            if (empty($errors)) {
                $dateNow = new \DateTime('now');
                $dateNow->setTimezone(new \DateTimeZone('UTC'));
            
                
                $comment = new Comment(null, 1, $dateNow , $_POST['content'], true, $article->getId());
                $commentRepository->insertComment($comment);
                $this->redirect('/posts/' . $_POST['id']);
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

    public function register() {

        $userRepository = new UserRepository();

        $errors= [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $form = new RegisterFormValidator();
            $errors = $form->validate($_POST);


            if (empty($errors)) {
            
                $user = new User(
                    $_POST['username'],
                    $email = $_POST['email'],
                    $password = $_POST['password'],
                );

                $userRepository->insertUser($user);
                $this->redirect('/signin');
            }

        }

        $this->render("register.html.twig", [
            'errors' => $errors,
        ]);
    }

    
    public function signIn() {

        $userRepository = new UserRepository();

        $errors= [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(isset($_POST['disconnect']))
            {
                session_destroy();
                $this->redirect('/');
            }
            $form = new LoginFormValidator();
            $errors = $form->validate($_POST);

            if(empty($errors))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $info = $userRepository->findOneByEmail($email);

                if(password_verify($password, $info["password"]))
                {
                                
                        $_SESSION['user'] = [
                            'id' => $info["id"],
                            'username' => $info["username"],
                            'email' => $info["email"],
                            'valid' => $info["valid"],
                            'admin' => $info["admin"],
                        ];
                        $this->redirect('/');
                }
                else{
                    $errors['userPassword'] = "Le mot de passe n'est pas correct";
                }
            }                        
        }

        $this->render("sign_in.html.twig", [
            'errors' => $errors,
        ]);
    }
    
}

?>