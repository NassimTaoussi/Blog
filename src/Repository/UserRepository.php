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
            $data = $query->fetch();
            return $data;
        }

        return false;

    }

    public function findAllAdmin() {
        $sql = "SELECT * FROM user WHERE user.admin = 1";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        if($query->rowCount() > 0) {
            $data = $query->fetchAll();
            return $data;
        }
        
        return false;
        
    }

    public function countByEmail($email){

        $sql = "SELECT count(id) as number FROM user WHERE email = '$email'";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $data = $query->fetch();
        return (int)$data['number'];

    }

    public function insertUser($user) {
        $sql = "INSERT INTO user (username, email, password, valid, admin) 
                VALUES(:username, :email, :password, :valid, :admin)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
        ':username'=> $user->getUserName(),
        ':email'=> $user->getEmail(),
        ':password'=> password_hash($user->getPassword(), PASSWORD_DEFAULT),
        ':valid' => 1,
        ':admin' => 0,
        ));


    }

}

?>