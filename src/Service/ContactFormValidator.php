<?php

namespace NTaoussi\Src\Service;

use NTaoussi\Src\Service\FormValidator;

class ContactFormValidator implements FormValidator {

    public function validate(array $data) : array {
        $errors = [];


        if(empty($data['firstName'] )) {
            $errors['firstName'] = 'Le champ prenom est vide';
        }
        
        if(empty($data['lastName'] )) {
            $errors['lastName'] = 'Le champ nom est vide';
        }

        if(empty($data['email'] )) {
            $errors['email'] = 'Le champ email est vide';
        }

        if(empty($data['message'] )) {
            $errors['message'] = 'Le champ message est vide';
        }

        return $errors;
    }

}