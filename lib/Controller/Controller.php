<?php

namespace NTaoussi\Lib\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller {

    public function render(string $template, array $context = []) {
        $loader = new FilesystemLoader(ROOT.'/template');

        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        $twig->display($template, $context);
    }

    public function redirect(string $url) {
        header('Location: '. $url);
        exit();
    }

}

?>