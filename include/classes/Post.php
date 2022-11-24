<?php
namespace include\classes;

class Post {
    public $table = 'posts';

    private $uid;
    private $title;
    private $content;
    private $img;

    function __construct($title, $content, $img_url, $user_id) {
        $this->title = $title;
        $this->content = $content;
        $this->img = $img_url;
        $this->uid = $user_id;
    }

    function store() {
        //TODO: execute query
    }

    /*Getters*/
    public function getTable(): string
    {
        return $this->table;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getImg()
    {
        return $this->img;
    }

    /*Setters*/
    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    public function setUid($uid): void
    {
        $this->uid = $uid;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function setImg($img): void
    {
        $this->img = $img;
    }



}