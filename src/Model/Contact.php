<?php

namespace NTaoussi\Src\Model;

use Exception;

class Contact {

    private string $firstName;
    private string $lastName;
    private string $email;
    private string $message;

    public function __construct(string $firstName, string $lastName, string $email, string $message) {
        $this->$firstName = $firstName;
        $this->$lastName = $lastName;
        $this->$email = $email;
        $this->$message = $message;
    }

    /* GETTERS & SETTERS */

    // $firstName
    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        
    }

    // $lastName
    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastname) {

    }

    // $email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {

    }

    // $message
    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {

    }


}

?>