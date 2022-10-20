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
    public function findAllCommentsNotValid($start, $length,): array
    {
        $sql = "SELECT comment.id, comment.author, date_of_post, username, content, comment.valid, comment.article FROM comment INNER JOIN user ON comment.author = user.id WHERE comment.valid = 0 LIMIT :start , :length";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':start', $start, \PDO::PARAM_INT);
        $query->bindParam(':length', $length, \PDO::PARAM_INT);
        $query->execute();
        $comments = $query->fetchAll();
        $comments = array_map(function($comment) {
            return new Comment($comment['id'],$comment['author'], $comment['username'], new \DateTime($comment['date_of_post']), $comment['content'], $comment['valid'], $comment['article']);
        }, $comments);
        return $comments;
    }

    
    public function findTotalComments(): int
    {
        $sql = "SELECT COUNT(id) AS nbr_comments FROM comment";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $comments = $query->fetch();
        
        return (int)$comments["nbr_comments"];
    }

    public function findTotalCommentsNotValid(): int
    {
        $sql = "SELECT COUNT(id) AS nbr_comments FROM comment WHERE valid = 0";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $comments = $query->fetch();
        
        return (int)$comments["nbr_comments"];
    }

    /** 
     *
     * 
     * @return array 
    */
    public function findCommentsByArticle($start, $length, $id): array
    {
        $sql = "SELECT comment.id, comment.author, date_of_post, username, content, comment.valid, comment.article FROM comment INNER JOIN user ON comment.author = user.id WHERE comment.article = :id AND comment.valid = 1 LIMIT :start , :length";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':start', $start, \PDO::PARAM_INT);
        $query->bindParam(':length', $length, \PDO::PARAM_INT);
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $comments = $query->fetchAll();
        $comments = array_map(function($comment) {
            return new Comment($comment['id'], $comment['author'], $comment['username'], new \DateTime($comment['date_of_post']), $comment['content'], $comment['valid'], $comment['article']);
        }, $comments);
        return $comments;
    }

    public function insertComment($comment) {
        $sql = "INSERT INTO comment (author, date_of_post, content, valid, article) 
                VALUES(:author, :dateOfPost, :content, :valid, :article)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
        ':author'=> $comment->getAuthorId(),
        ':dateOfPost'=> $comment->getDateOfPost()->format('Y-m-d H:i:s'),
        ':content'=> $comment->getContent(),
        ':valid' => $comment->getValid(),
        ':article' => $comment->getArticle(),
        ));


    }

    public function validComment($id)
    {
        $req = $this->pdo->prepare('UPDATE comment SET valid = 1 WHERE id = :id');
        return $req->execute(array(
            'id' => $id,
        ));
    }

    public function deleteComment($id)
    {
        $req = $this->pdo->prepare('DELETE FROM comment WHERE id = :id');
        return $req->execute(array(
            'id' => $id,
        ));
    }

}