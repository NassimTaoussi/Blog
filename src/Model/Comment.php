<?php

namespace NTaoussi\Src\Model;

class Comment {

    
    private string $author;
    private \DateTime $dateOfPost;
    private string $content;
    private bool $valid;

    public function __construct( $author, $dateOfPost, $content, $valid)
    {
        
        $this->author = $author;
        $this->dateOfPost = $dateOfPost;
        $this->content = $content;
        $this->valid = $valid;
    }

    /* GETTERS & SETTERS */


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