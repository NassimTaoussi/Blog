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
        $result = $this->pdo->query('SELECT * FROM article ORDER BY maj_date');

        $articles = $result->fetchAll();
        
        return $articles;
    }

    /** 
     *
     * 
     * @return array 
    */
    public function findOneById(int $id): array
    {
        $result = $this->pdo->query('SELECT * FROM article WHERE id = :id');
        $result->execute(['id' => $id]);
        $article = $result->fetch();
        
        return $article;
    }

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM article WHERE id = :id");
        $query->execute(['id' => $id]);
    }

}

?>