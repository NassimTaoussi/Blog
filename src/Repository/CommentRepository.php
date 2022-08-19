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
        $result = $this->pdo->query('SELECT comment.id, date_of_post, username, content, comment.valid, comment.article FROM comment INNER JOIN user ON comment.author = user.id WHERE comment.valid = 0 LIMIT ' . $start . ',' . $length);
        $comments = $result->fetchAll();
        $comments = array_map(function($comment) {
            return new Comment($comment['id'], $comment['username'], new \DateTime($comment['date_of_post']), $comment['content'], $comment['valid'], $comment['article']);
        }, $comments);
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
    public function findCommentsByArticle($start, $length, $id): array
    {
        $result = $this->pdo->query('SELECT comment.id, date_of_post, username, content, comment.valid, comment.article FROM comment INNER JOIN user ON comment.author = user.id WHERE comment.article = ' . $id . ' LIMIT ' . $start . ',' . $length);
        $comments = $result->fetchAll();
        $comments = array_map(function($comment) {
            return new Comment($comment['id'], $comment['username'], new \DateTime($comment['date_of_post']), $comment['content'], $comment['valid'], $comment['article']);
        }, $comments);
        return $comments;
    }

    public function insertComment($comment) {
        $sql = "INSERT INTO comment (author, date_of_post, content, valid, article) 
                VALUES(:author, :dateOfPost, :content, :valid, :article)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(':author'=> $comment->getAuthor(),
        ':dateOfPost'=> $comment->getDateOfPost()->format('Y-m-d H:i:s'),
        ':content'=> $comment->getContent(),
        ':valid' => $comment->getValid(),
        ':article' => $comment->getArticle(),
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