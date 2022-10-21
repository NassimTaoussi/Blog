<?php

namespace NTaoussi\Lib\Controller;

use NTaoussi\Lib\Exception\AccessDeniedException;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
abstract class Controller {

    public static function render(string $template, array $context = []) {
        $loader = new FilesystemLoader(dirname(__DIR__, 2) .'/template');

        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        $twig->display($template, $context);
    }

    public static function redirect(string $url) {
        header('Location:'. $url);
        exit();
    }

    public static function denyAccessUnlessGranted($valid = null, $admin = null)
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

    public function setFlash(string $message, string $type) {
        $_SESSION['user']['flash'] = [
            'message' => $message,
            'type' => $type,
        ] ;
    }

    public function flash() {
        if(isset($_SESSION['user']['flash']))
        {
            unset($_SESSION['user']['flash']);
        }
    }

}

?>