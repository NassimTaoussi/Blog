<?php

namespace NTaoussi\Src\Controller;

use NTaoussi\Lib\Controller\Controller;
use NTaoussi\Src\Model\User;
use NTaoussi\Src\Repository\UserRepository;
use NTaoussi\Src\Service\RegisterFormValidator;
use NTaoussi\Src\Service\LoginFormValidator;
class SecurityController extends Controller {

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

        session_regenerate_id();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

    public function disconnect() {
        session_regenerate_id(); 
        session_destroy();
        $this->redirect('/');
    }

}

?>