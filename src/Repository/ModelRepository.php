<?php

use NTaoussi\Src\Model\Database;

class ModelRepository {

    protected $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }

}

?>