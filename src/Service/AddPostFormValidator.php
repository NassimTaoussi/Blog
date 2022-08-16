<?php

namespace NTaoussi\Src\Service;

use NTaoussi\Src\Repository\ArticleRepository;
use NTaoussi\Src\Service\FormValidator;

class AddPostFormValidator implements FormValidator {

    public function validate(array $data) : array {

        $errors = [];
        $articleRepository = new ArticleRepository;

        if(empty($data['title'] )) {
            $errors['title'] = 'Le titre est vide';
        }
        if(empty($data['chapo'] )) {
            $errors['chapo'] = 'Le chapo est vide';
        }
        if(empty($data['content'] )) {
            $errors['content'] = 'La description est vide';
        }
        if(empty($data['picture'] )) {
            $errors['picture'] = 'Le champ image est vide';
        }
        return $errors;
    }
}


?>