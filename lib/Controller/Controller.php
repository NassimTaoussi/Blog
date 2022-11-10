<?php

namespace NTaoussi\Lib\Controller;

use NTaoussi\Lib\Exception\AccessDeniedException;
use NTaoussi\Lib\Model\FlashMessages;
use Twig\Environment;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Twig\Loader\FilesystemLoader;
abstract class Controller {

    protected FlashMessages $flashMessages;

    public function __construct() 
    {
        if(!isset($_SESSION['user']['flash'])) {
            $_SESSION['user']['flash'] = [];
        }
        $this->flashMessages = new FlashMessages($_SESSION['user']['flash']);
    }

    public function render(string $template, array $context = []) {
        $loader = new FilesystemLoader(dirname(__DIR__, 2) .'/template');

        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        $twig->addGlobal('flashMessages', $this->flashMessages);
        $twig->display($template, $context);
    }

    public function redirect(string $url) {
        header('Location:'. $url);
        exit();
    }

    public function denyAccessUnlessGranted($valid = null, $admin = null)
    {
        if($valid == 1) 
        {
            if($admin == 0) 
            {
                throw new AccessDeniedException("Vous n'avez pas les droits administrateurs pour voir cette page");
            }
        }
        else 
        {
            throw new AccessDeniedException("Vous devez être connecter pour voir cette page");
        }
    }

    public function sendEmail() {
        try {
            // Tentative de création d’une nouvelle instance de la classe PHPMailer
            $mail = new PHPMailer (true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = "nassim.taoussi@gmail.com";
            $mail->Password = $_ENV['EMAIL_GMAIL_APP_KEY'];
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom($_POST['contactEmail']);
            $mail->addAddress($_ENV['EMAIL_RECEIPTER']);
            $mail->isHTML(true);
            $mail->Body = $_POST['contactMessage'];

            $mail->send();
            $this->flashMessages->add(['message' => 'Message envoyer', 'type' => 'success']);
            $this->redirect('/');
        // (…)
        } catch (\Exception $e) {
                return "Erreur : ".$mail->ErrorInfo;
        }               
    }

}

?>