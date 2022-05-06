<?php

namespace NTaoussi\Src\Model;

class Comment {

    private string $author;
    private DateTime $dateOfPost;
    private string $content;
    private bool $valid;

    public function __construct($author, $dateOfPost, $content, $valid)
    {
        $this->author = $author;
        $this->dateOfPost = $dateOfPost;
        $this->content = $content;
    }

}

?>