<?php

namespace NTaoussi\Src\Model;

class Comment {

    private ?int $id = null;
    private string $author;
    private \DateTime $dateOfPost;
    private string $content;
    private bool $valid;
    private int $article;

    public function __construct(?int $id, string $author, \DateTime $dateOfPost, string $content, bool $valid, int $article)
    {
        $this->id = $id;
        $this->author = $author;
        $this->dateOfPost = $dateOfPost;
        $this->content = $content;
        $this->valid = $valid;
        $this->article = $article;
    }

    /* GETTERS & SETTERS */

    // Id

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }


    // Author

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getAuthor() {
        return $this->author;
    }

    // DateOfPost

    public function setDateOfPost($dateOfPost) {
        $this->dateOfPost = $dateOfPost;
    }

    public function getDateOfPost() {
        return $this->dateOfPost;
    }

    // Content

    public function setContent($content) {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }

    // Valid

    public function setValid($valid) {
        $this->valid = $valid;
    }

    public function getValid() {
        return $this->valid;
    }

    // Article

    public function setArticle($article) {
        $this->valid = $article;
    }

    public function getArticle() {
        return $this->article;
    }

}

?>