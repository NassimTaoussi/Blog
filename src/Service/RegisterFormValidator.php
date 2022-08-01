<?php

namespace NTaoussi\Src\Service;

use NTaoussi\Src\Service\FormValidator;
use NTaoussi\Src\Repository\UserRepository;

class RegisterFormValidator implements FormValidator {

    public function validate(array $data) : array {
        $errors = [];

        $userRepository = new UserRepository();

        if(empty($data['username'] )) {
            $errors['username'] = 'Le champ pseudo est vide';
        }
        

        if(empty($data['email'] )) {
            $errors['email'] = 'Le champ email est vide';
        }
        else {
            $number = $userRepository->countByEmail($data['email']);
            if($number == 1) {
                $errors['email'] = "Un compte a cette adresse email existe déjà";
            }
        }

        if(empty($data['password'] )) {
            $errors['password'] = 'Le champ mot de passe est vide';
        }

        return $errors;
    }

}