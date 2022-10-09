<?php

namespace NTaoussi\Lib\Controller;

use NTaoussi\Lib\Exception\AccessDeniedException;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
abstract class Controller {

    public static function render(string $template, array $context = []) {
        $loader = new FilesystemLoader(ROOT.'/template');

        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        $twig->display($template, $context);
    }

    public static function redirect(string $url) {
        header('Location: '. $url);
        exit();
    }

    public static function denyAccessUnlessGranted($valid, $admin)
    {
        if($valid == 1) 
        {
            if($admin == 1) 
            {

            }
            else 
            { 
                throw new AccessDeniedException();
            }
        }
        else 
        {
            throw new AccessDeniedException();
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