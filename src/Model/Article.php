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
}

?>