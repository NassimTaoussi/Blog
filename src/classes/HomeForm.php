<?php

namespace NTaoussi\Src\Classes;

    class HomeForm {

        private string $firstName;
        private string $lastName;
        private string $email;
        private string $message;

        public function __construct(string $firstName, string $lastName, string $email, string $message) {
            $this->setFirstName($firstName);
            $this->setLastName($lastName);
            $this->setEmail($email);
            $this->setMessage($message);
        }

        /* GETTERS & SETTERS */

        // $firstName
        public function getFirstName() {
            return $this->firstName;
        }

        public function setFirstName($firstName) {
            if(isset($firstName)) {

            }
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