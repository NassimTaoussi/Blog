<?php

namespace NTaoussi\Src\Model;

class Article {

    private string $author;
    private string $title;
    private DateTime $majDate;
    private string $content;
    private string $chapo;

    public function __construct($author, $title, $majDate, $content, $chapo)
    {
        $this->author = $author;
        $this->title = $title;
        $this->majDate = $majDate;
        $this->content = $content;
        $this->chapo = $chapo;
    }
}

?>