<?php

namespace NTaoussi\Src\Repository;

use NTaoussi\Src\Repository\ModelRepository;
use NTaoussi\Src\Model\Comment;

class CommentRepository extends ModelRepository {

    /** 
     *
     * 
     * @return array 
    */
    public function findAllComments(): array
    {
        $result = $this->pdo->query('SELECT * FROM comment ORDER BY maj_date');
        $comments = $result->fetch();
        
        return $comments;
    }

    /** 
     *
     * 
     * @return array 
    */
    public function findTotalComments(): int
    {
        $result = $this->pdo->query('SELECT COUNT(id) AS nbr_comments FROM comment');

        $comments = $result->fetch();
        
        return (int) $comments["nbr_comments"];
    }

    /** 
     *
     * 
     * @return array 
    */
    public function findComments($start, $length): array
    {
        $result = $this->pdo->query('SELECT * FROM comment LIMIT ' . $start . ',' . $length);
        $comments = $result->fetchAll();
        return $comments;
    }

}