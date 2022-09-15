<?php

namespace NTaoussi\Src\Service;

use NTaoussi\Src\Repository\ArticleRepository;
use NTaoussi\Src\Service\FormValidator;

class UpdatePostFormValidator implements FormValidator {

    public function validate(array $data) : array {
        $errors = [];
        $articleRepository = new ArticleRepository;

        if(empty($_POST['titlePost'])){
            $errors['title'] = 'Le titre est vide';
        }

        if(empty($_POST['chapoPost'])){
            $errors['chapo'] = 'Le chapo est vide';
        }

        if(empty($_POST['authorPost'])){
            $errors['author'] = 'L\'auteur n\'est pas défini';
        }

        if(empty($_POST['contentPost'])){
            $errors['content'] = 'La description est vide';
        }

        return $errors;
    }
}

?>