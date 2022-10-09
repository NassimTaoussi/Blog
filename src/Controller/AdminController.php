<?php

namespace NTaoussi\Src\Controller;

use NTaoussi\Src\Model\FormValidator as FormValidator;
use NTaoussi\Src\Service\AddPostFormValidator;
use NTaoussi\Src\Service\UpdatePostFormValidator;
use NTaoussi\Src\Repository\ArticleRepository;
use NTaoussi\Lib\Controller\Controller;
use NTaoussi\Src\Model\Article;
use NTaoussi\Src\Model\User;
use NTaoussi\Src\Repository\CommentRepository;
use NTaoussi\Src\Repository\UserRepository;

class AdminController extends Controller {

    public function postsList() {

            $this->denyAccessUnlessGranted($_SESSION['user']['valid'], $_SESSION['user']['admin']);

            $articleRepository = new ArticleRepository();
            // Récupérer le nombre d'enregistrements
            $totalArticles = $articleRepository->findTotal();

            $nbrElementsByPage = 10;
            $nbrOfPages = ceil($totalArticles / $nbrElementsByPage);
            $page = (int)($_GET['page'] ?? 1);
            $start = ($page - 1) * $nbrElementsByPage;

            // Récupérer les enregistrements eux-mêmes
            $articles = $articleRepository->findPosts($start, $nbrElementsByPage);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $articleRepository->deletePost($_POST['id']);
                    $this->redirect('/postsList');        
            }

            $this->render("admin/postsList.html.twig", [
                'articles' => $articles,
                'allPages' => $nbrOfPages,
                'page' => $page,
            ]);
       
    }

    public function editPost($id) {
            $articleRepository = new ArticleRepository();
            $userRepository = new UserRepository();
            $errors= [];

            $article = $articleRepository->findOneById($id);
            $admins = $userRepository->findAllAdmin();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $form = new UpdatePostFormValidator();
                $errors = $form->validate($_POST);

                if (empty($errors)) {
                    $article->setTitle($_POST['titlePost']);
                    $article->setChapo($_POST['chapoPost']);
                    $article->setAuthorId($_POST['authorPost']);
                    $article->setContent($_POST['contentPost']);

                    $article = $articleRepository->updateArticle($article);
                }
                
            }

            $this->render("admin/editPost.html.twig", [
                'errors' =>  $errors,
                'article' => $article,
                'admins' => $admins
            ]);
    }

    public function addPost() {
            $articleRepository = new ArticleRepository();
            $errors= [];

            $token = md5(uniqid(rand(), true));
            $_SESSION['user']['token'] = $token;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST['csrf_token']))
                {
                    if($_POST['csrf_token'] == $_SESSION['user']['token'])
                    {
                        $form = new AddPostFormValidator();
                        $errors = $form->validate($_POST);

                        if (empty($errors)) {
                            $dateNow = new \DateTime('now');
                            $dateNow->setTimezone(new \DateTimeZone('UTC'));
                        
                            
                            $article = new Article(null, $_SESSION['user']['id'], $_SESSION['user']['username'], $_POST['title'], $dateNow , $_POST['content'], $_POST['chapo'], $_POST['picture']);
                            $articleRepository->insertPost($article);
                            $this->redirect('/');
                        }
                    }
                }

            }

            $this->render("admin/addPost.html.twig", [
                'errors' =>  $errors
            ]);
    }


    public function commentsList() {
            $commentRepository = new CommentRepository();

            // Récupérer le nombre d'enregistrements
            $totalComments = $commentRepository->findTotalComments();

            $nbrElementsByPage = 10;
            $nbrOfPages = ceil($totalComments / $nbrElementsByPage);
            $page = (int)($_GET['page'] ?? 1);
            $start = ($page - 1) * $nbrElementsByPage;

            // Récupérer les enregistrements eux-mêmes
            $comments = $commentRepository->findAllCommentsNotValid($start, $nbrElementsByPage);

            $token = md5(uniqid(rand(), true));
            $_SESSION['user']['token'] = $token;

            $this->render("admin/commentsList.html.twig", [
                'comments' => $comments,
                'allPages' => $nbrOfPages,
                'page' => $page,
            ]);
    }

    public function deleteComment() {
        $commentRepository = new CommentRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['csrf_token']))
            {
                if($_POST['csrf_token'] == $_SESSION['user']['token'])
                {
                    if(isset($_POST['delete'])) {
                        $commentRepository->deleteComment($_POST['delete']);
                    }
                }
            }
        }
        $this->redirect('/commentsList'); 
    }

    public function validComment() {
        $commentRepository = new CommentRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            {
                if($_POST['csrf_token'] == $_SESSION['user']['token'])
                {
                    if(isset($_POST['valid'])) {
                        $commentRepository->validComment($_POST['valid']);
                    }   
                }
            }    
        }
        $this->redirect('/commentsList'); 
    }

}