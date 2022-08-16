<?php

namespace NTaoussi\Src\Model;

class Article {
    
    private ?int $id = null;
    private int $authorId;
    private string $authorName;
    private string $title;
    private \DateTime $majDate;
    private string $content;
    private string $chapo;
    private string $picture;

    public function __construct(?int $id, int $authorId, string $authorName, string $title, \DateTime $majDate, string $content, string $chapo, string $picture)
    {
        $this->id = $id;
        $this->authorId = $authorId;
        $this->authorName = $authorName;
        $this->title = $title;
        $this->majDate = $majDate;
        $this->content = $content;
        $this->chapo = $chapo;
        $this->picture = $picture;
    }
    
    /* GETTERS and SETTERS */

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

    // Title

    public function setTitle($title) {
        $this->title = $title ;
    }

    public function getTitle() {
        return $this->title;
    }

    // MajDate

    public function setMajDate($majDate) {
        $this->majDate = $majDate ;
    }

    public function getMajDate() {
        return $this->majDate ;
    }

    // Content

    public function setContent($content) {
        $this->content = $content ;
    }

    public function getContent() {
        return $this->content ;
    }

    // Chapo

    public function setChapo($chapo) {
        $this->chapo = $chapo ;
    }

    public function getChapo() {
        return $this->chapo ;
    }

    // Picture

    public function setPicture($picture) {
        $this->picture = $picture ;
    }

    public function getPicture() {
        return $this->picture ;
    }

}

?>