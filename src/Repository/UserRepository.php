<?php

namespace NTaoussi\Src\Repository;

use NTaoussi\Src\Repository\ModelRepository;
use NTaoussi\Src\Model\User;

class UserRepository extends ModelRepository {

    public function findOneByEmail($email){

        $sql = "SELECT * FROM user WHERE email = '$email'";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        if($query->rowCount() > 0) {
            $data = $query->fetchAll();
        }
        else{
            print "Error";
        }
            
        return $data;

    }

    public function insertUser($user) {
        $sql = "INSERT INTO user (first_name, last_name, username, age, email, password, phone_number, avatar, valid, admin) 
                VALUES(:first_name, :last_name, :username, :age, :email, :password, :phone_number, :avatar, :valid, :admin)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
        ':first_name'=> $user->getFirstName(),
        ':last_name'=> $user->getLastName(),
        ':username'=> $user->getUserName(),
        ':age'=> $user->getAge()->format('Y-m-d'),
        ':email'=> $user->getEmail(),
        ':password'=> password_hash($user->getPassword(), PASSWORD_DEFAULT),
        ':phone_number' => null,
        ':avatar' => null,
        ':valid' => null,
        ':admin' => null,
        ));


    }

}

?>