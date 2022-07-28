<?php

namespace NTaoussi\Src\Model;

class User {

        private string $username;
        private string $email;
        private string $password;
        private bool $validate;
        private bool $admin;

        public function __construct($username, $email, $password) 
        {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        /* GETTERS & SETTERS */

        // $username

        public function getUsername() {
            return $this->username;
        }

        public function setUsername($username) {
            $this->username = $username;
        }


        // $email

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        // $password

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        // $valid

        public function getValid() {
            return $this->validate;
        }

        public function setValid($validate) {
            $this->validate = $validate;
        }

        // $admin

        public function getAdmin() {
            return $this->admin;
        }

        public function setAdmin($admin) {
            $this->admin = $admin;
        }
}

?>