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
        $result = $this->pdo->query('SELECT * FROM article ORDER BY maj_date');

        $articles = $result->fetchAll();
        
        return $articles;
    }

    /** 
     *
     * 
     * @return array 
    */
    public function findTotal(): int
    {
        $result = $this->pdo->query('SELECT COUNT(id) AS nbr_articles FROM article');

        $articles = $result->fetch();
        
        return (int) $articles["nbr_articles"];
    }

    /** 
     *
     * 
     * @return array 
    */
    public function findPosts($start, $length): array
    {
        $result = $this->pdo->query('SELECT * FROM article LIMIT ' . $start . ',' . $length);
        $posts = $result->fetchAll();
        $posts = array_map(function($post) {
            return new Article($post['id'], $post['author'], $post['title'], new \DateTime($post['maj_date']), $post['content'], $post['chapo'], $post['picture']);
        }, $posts);
        return $posts;
    }

    
    /** 
     *
     * 
     * @return array 
    */
    public function findOneById(int $id): array
    {
        $result = $this->pdo->query('SELECT * FROM article WHERE id =' . $id);
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