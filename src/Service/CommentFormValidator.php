<?php

namespace NTaoussi\Src\Service;

use NTaoussi\Src\Repository\CommentRepository;
use NTaoussi\Src\Service\FormValidator;

class CommentFormValidator implements FormValidator {

    public function validate(array $data) : array {

        $errors = [];
        $commentRepository = new CommentRepository;

        if(empty($data['username'] )) {
            $errors['username'] = 'Le champ pseudo est vide';
        }
        if(empty($data['content'] )) {
            $errors['content'] = 'Le champ commentaire est vide';
        }
        return $errors;
    }
}


?>