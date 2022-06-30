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
        $comments = array_map(function($comment) {
            return new Comment($comment['author'], new \DateTime($comment['date_of_post']), $comment['content'], $comment['valid']);
        }, $comments);
        return $comments;
    }

    public function insertComment($author, $dateOfPost, $content, $valid) {
        $sql = "INSERT INTO comment (author, date_of_post, content, valid) 
                VALUES(:author, :dateOfPost, :content, :valid)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(':author'=> $author,
        ':dateOfPost'=> $dateOfPost = $dateNow = date('Y-m-d H:i:s'),
        ':content'=> $content,
        ':valid' => $valid));


    }

}