<?php

namespace NTaoussi\Src\Model;

class Comment {

    private ?int $id = null;
    private int $authorId;
    private string $authorName;
    private \DateTime $dateOfPost;
    private string $content;
    private int $valid;
    private int $article;

    public function __construct(?int $id, int $authorId, string $authorName, \DateTime $dateOfPost, string $content, int $valid, int $article)
    {
        $this->id = $id;
        $this->authorId = $authorId;
        $this->authorName = $authorName;
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


    // AuthorId

    public function setAuthorId($authorId) {
        $this->authorId = $authorId;
    }

    public function getAuthorId() {
        return $this->authorId;
    }

    // AuthorName

    public function setAuthorName($authorName) {
        $this->authorName = $authorName;
    }

    public function getAuthorName() {
        return $this->authorName;
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
        $this->article = $article;
    }

    public function getArticle() {
        return $this->article;
    }

}

?>