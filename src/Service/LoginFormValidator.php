<?php

namespace NTaoussi\Src\Service;

use NTaoussi\Src\Service\FormValidator;
use NTaoussi\Src\Repository\UserRepository;

class LoginFormValidator implements FormValidator {
    
    public function validate(array $data) : array {
        $errors = [];

        $userRepository = new UserRepository();

        if(empty($data['email'] )) {
            $errors['email'] = 'Le champ email est vide';
        }
        else {
            $number = $userRepository->countByEmail($data['email']);
            if($number == 0) {
                $errors['email'] = "Cette adresse n'existe pas";
            }
        }

        if(empty($data['password'] )) {
            $errors['password'] = 'Le champ mot de passe est vide';
        }

        return $errors;
    }

}

?>