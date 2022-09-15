<?php

namespace NTaoussi\Src\Repository;

use NTaoussi\Src\Repository\ModelRepository;
use NTaoussi\Src\Model\Article;

class ArticleRepository extends ModelRepository {


    /** 
     *
     * 
     * @return array 
    */
    public function findAll(): array
    {
        $sql = "SELECT * FROM article ORDER BY maj_date";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $articles = $query->fetchAll();
        
        return $articles;
    }

    
    public function findTotal(): int
    {
        $sql = "SELECT COUNT(id) AS nbr_articles FROM article";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $articles = $query->fetch();
        
        return (int) $articles["nbr_articles"];
    }

    public function findPosts($start, $length): array
    {
        $sql = "SELECT article.id, author, user.username AS usernameAuthor, title, chapo, content, maj_date, picture  FROM article INNER JOIN user ON article.author = user.id ORDER BY maj_date DESC LIMIT :start , :length";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':start', $start, \PDO::PARAM_INT);
        $query->bindParam(':length', $length, \PDO::PARAM_INT);
        $query->execute();
        $posts = $query->fetchAll();
        $posts = array_map(function($post) {
            return new Article($post['id'], $post['author'], $post['usernameAuthor'], $post['title'], new \DateTime($post['maj_date']), $post['content'], $post['chapo'], $post['picture']);
        }, $posts);
        return $posts;
    }
    
    public function findOneById(int $id): Article
    {
        $sql = "SELECT article.id, author, user.username AS usernameAuthor, title, chapo, content, maj_date, picture  FROM article INNER JOIN user ON article.author = user.id WHERE article.id = :id";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $post = $query->fetch();
        $article =  new Article((int)$post['id'], $post['author'], $post['usernameAuthor'], $post['title'], new \DateTime($post['maj_date']), $post['content'], $post['chapo'], $post['picture']);
        return $article;
    }

    public function deletePost(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM article WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    public function insertPost($article)
    {
        $sql = "INSERT INTO article(author, title, chapo, content, creation_date, maj_date, picture)
                VALUES(:author, :title, :chapo, :content, :dateOfPost, :dateOfPost, :picture)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
        ':author'=> $article->getAuthor(),
        ':title' => $article->getTitle(),
        ':chapo' => $article->getChapo(),
        ':content'=> $article->getContent(),
        ':dateOfPost'=> $article->getMajDate()->format('Y-m-d H:i:s'),
        ':picture' => $article->getPicture(),
        ));
    }

    public function updateArticle($article) 
    {
        $sql = 'UPDATE article SET title = :title, chapo = :chapo, author = :author, content = :content, maj_date = :majDateOfPost WHERE id = :id';
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
        ':title' => $article->getTitle(),
        ':chapo' => $article->getChapo(),
        ':author'=> $article->getAuthorId(),
        ':content'=> $article->getContent(),
        ':id' => $article->getId(),
        ':majDateOfPost'=> $article->getMajDate()->format('Y-m-d H:i:s'),
        ));
    }
}

?>