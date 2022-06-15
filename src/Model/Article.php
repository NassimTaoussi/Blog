<?php

namespace NTaoussi\Src\Model;

class Article {
    
    private int $id;
    private string $author;
    private string $title;
    private \DateTime $majDate;
    private string $content;
    private string $chapo;
    private string $picture;

    public function __construct($id, $author, $title, $majDate, $content, $chapo, $picture)
    {
        $this->id = $id;
        $this->author = $author;
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

    // Author

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getAuthor() {
        return $this->author;
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