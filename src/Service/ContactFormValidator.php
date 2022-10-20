<?php

namespace NTaoussi\Src\Service;

use NTaoussi\Src\Service\FormValidator;

class ContactFormValidator implements FormValidator {

    public function validate(array $data) : array {
        $errors = [];


        if(empty($data['contactFirstname'] )) {
            $errors['firstName'] = 'Le champ prenom est vide';
        }
        
        if(empty($data['contactLastname'] )) {
            $errors['lastName'] = 'Le champ nom est vide';
        }

        if(empty($data['contactEmail'] )) {
            $errors['email'] = 'Le champ email est vide';
        }

        if(empty($data['contactMessage'] )) {
            $errors['message'] = 'Le champ message est vide';
        }

        return $errors;
    }

}