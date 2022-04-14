<?php

    namespace NTaoussi\Src\Classes;

    class User {
        private string $firstName;
        private string  $lastName;
        private string $username;
        private int $age;
        private string $email;
        private string $telephoneNumber;
        private string $avatar;
        private bool $validate;
        private bool $admin;

        function construct__($firstName, $lastName, $username, $age, $email, $telephoneNumber, $avatar) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->username = $username;
            $this->age = $age;
            $this->email = $email;
            $this->telephoneNumber = $telephoneNumber;
            $this->avatar = $avatar;
        }

        /* GETTERS & SETTERS */

        // $firstName

        function getFirstName() {
            return $this->firstName;
        }

        function setFirstName($firstName) {
            $this->firstName = $firstName;
        }

        // $lastName

        function getLastName() {
            return $this->lastName;
        }

        function setLastName($lastName) {
            $this->lastName = $lastName;
        }

        // $username

        function getUsername() {
            return $this->username;
        }

        function setUsername($username) {
            $this->username = $username;
        }

        // $age

        function getAge() {
            return $this->age;
        }

        function setAge($age) {
            $this->age = $age;
        }

        // $email

        function getEmail() {
            return $this->email;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        // $telephoneNumber

        function getTelephoneNumber() {
            return $this->telephoneNumber;
        }

        function setTelephoneNumber($telephoneNumber) {
            $this->telephoneNumber = $telephoneNumber;
        }

        // $avatar

        function getAvatar() {
            return $this->avatar;
        }

        function setAvatar($avatar) {
            $this->avatar = $avatar;
        }
        
    }

?>