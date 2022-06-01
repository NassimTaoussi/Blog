<?php

namespace NTaoussi\Src\Model;

class Comment {

    private int $id;
    private string $author;
    private \DateTime $dateOfPost;
    private string $content;
    private bool $valid;

    public function __construct($id, $author, $dateOfPost, $content, $valid)
    {
        $this->id = $id;
        $this->author = $author;
        $this->dateOfPost = $dateOfPost;
        $this->content = $content;
        $this->valid = $valid;
    }

}

?>