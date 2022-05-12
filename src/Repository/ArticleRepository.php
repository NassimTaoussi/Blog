<?php

namespace NTaoussi\Src\Repository;

use NTaoussi\Src\Repository\ModelRepository;

class ArticleRepository extends ModelRepository {


    /** 
     *
     * 
     * @return array 
    */
    public function findAll(): array
    {
        $result = $this->pdo->query('SELECT * FROM article');

        $articles = $result->fetchAll();
        
        return $articles;
    }

    /** 
     *
     * 
     * @return array 
    */
    public function findOneById(): array
    {
        $result = $this->pdo->query('SELECT * FROM article ORDER BY maj_date');

        $articles = $result->fetchAll();
        
        return $articles;
    }

}

?>