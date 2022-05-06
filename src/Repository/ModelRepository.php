<?php

namespace NTaoussi\Src\Repository;

use NTaoussi\Lib\Model\Database;

class ModelRepository {

    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

}

?>