<?php

namespace NTaoussi\Src\Model;

class Comment {

    private int $id;
    private int $author;
    private \DateTime $dateOfPost;
    private string $content;
    private bool $valid;

    public function __construct($author, $dateOfPost, $content, $valid)
    {
        $this->author = $author;
        $this->dateOfPost = $dateOfPost;
        $this->content = $content;
        $this->valid = $valid;
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

}

?>