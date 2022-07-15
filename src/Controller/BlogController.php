<?php

namespace NTaoussi\Src\Controller;

use NTaoussi\Src\Repository\ArticleRepository as ArticleRepository;
use NTaoussi\Lib\Controller\Controller as Controller;
use NTaoussi\Src\Model\Comment;
use NTaoussi\Src\Model\User;
use NTaoussi\Src\Repository\CommentRepository;
use NTaoussi\Src\Repository\UserRepository;

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
        $errors= [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(empty($_POST['content'])) {
                $errors['content'] = "le contenu est obligatoire";
            }

            if (empty($errors)) {
                $dateNow = new \DateTime('now');
                $dateNow->setTimezone(new \DateTimeZone('UTC'));
            
                
                $comment = new Comment(1, $dateNow , htmlspecialchars($_POST['content']), true);
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

            if(empty($_POST['firstName'])) {
                $errors['firstName'] = "le prenom est obligatoire";
                $errors['lastName'] = "le nom est obligatoire";
                $errors['username'] = "le pseudo est obligatoire";
                $errors['bornDate'] = "l'âge est obligatoire";
                $errors['email'] = "l'email' est obligatoire";
                $errors['password'] = "le mot de passe est obligatoire";
            }

            dump($_POST);

            $inputBornDate = strtotime(htmlspecialchars($_POST['bornDate']));
            $newFormat = date('d-m-Y',$inputBornDate);


            if (empty($errors)) {

                $firstName = htmlspecialchars($_POST['firstName']);
                $lastName = htmlspecialchars($_POST['lastName']);
                $userName = htmlspecialchars($_POST['username']);
                $bornDate = new \DateTime($newFormat);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                dump($bornDate);
            
                $user = new User(
                    $firstName,
                    $lastName,
                    $userName,
                    $bornDate,
                    $email,
                    $password,
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
        $connexionStatus = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            dump($_POST['email']);
            dump($_POST['password']);

            /*if(empty($_POST['email'] && empty($_POST['password']))) {
                $errors['email'] = "l'email' est obligatoire";
                $errors['password'] = "le mot de passe est obligatoire";
            }*/
            if(empty($errors)){
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $info = $userRepository->findOneByEmail($email);
                dump($info);
                if(password_verify($password, $info[0]["password"]))
                {
                    $connexionStatus['connexionSuccess'] = "Connexion réussie";
                }
                else{
                    $connexionStatus['connexionFailure'] = "Connexion echouée";
                }
                    
      
            }

        }
        

        $this->render("sign_in.html.twig", [
            'errors' => $errors,
            'connexion' => $connexionStatus,
        ]);
    }
    
}

?>