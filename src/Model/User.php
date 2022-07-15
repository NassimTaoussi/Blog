<?php

namespace NTaoussi\Src\Model;

class User {

        private string $firstName;
        private string  $lastName;
        private string $username;
        private \DateTime $age;
        private string $email;
        private string $password;
        private string $telephoneNumber;
        private string $avatar;
        private bool $validate;
        private bool $admin;

        public function __construct($firstName, $lastName, $username, $age, $email, $password) 
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->username = $username;
            $this->age = $age;
            $this->email = $email;
            $this->password = $password;
        }

        /* GETTERS & SETTERS */

        // $firstName

        public function getFirstName() {
            return $this->firstName;
        }

        public function setFirstName($firstName) {
            $this->firstName = $firstName;
        }

        // $lastName

        public function getLastName() {
            return $this->lastName;
        }

        public function setLastName($lastName) {
            $this->lastName = $lastName;
        }

        // $username

        public function getUsername() {
            return $this->username;
        }

        public function setUsername($username) {
            $this->username = $username;
        }

        // $age

        public function getAge() {
            return $this->age;
        }

        public function setAge($age) {
            $this->age = $age;
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

        // $telephoneNumber

        public function getTelephoneNumber() {
            return $this->telephoneNumber;
        }

        public function setTelephoneNumber($telephoneNumber) {
            $this->telephoneNumber = $telephoneNumber;
        }

        // $avatar

        public function getAvatar() {
            return $this->avatar;
        }

        public function setAvatar($avatar) {
            $this->avatar = $avatar;
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