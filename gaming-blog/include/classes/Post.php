<?php

require_once 'DB.php';

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

    public function showAll() {
        $query = "SELECT * FROM '".$this->table."'";

    }

    public static function postExists($post_id) {
        $query = sprintf("SELECT * FROM posts WHERE id='%d' ", $post_id);

        $result = DB::getInstance()->runQuery($query, "SELECT");
        //post[0]['title']

        if (count($result) != 1) {
            $_SESSION['post_no_exist'] = 'This post ID ['.$post_id.'] doesn\'t exist. Please try again.';
            header("location:" . ROOT_PATH . 'index.php?page=home');
            return false;
        }

        return $result;
    }

    public function store() {
        $timestamp = date("Y-m-d H:i:s");
        $query = sprintf(
            "INSERT INTO posts (user_id, title, content, image, created_at)
                    VALUES ('%d', '%s', '%s', '%s', '%s');",
            DB::escape($this->uid),
            DB::escape($this->title),
            DB::escape($this->content),
            DB::escape($this->img),
            DB::escape($timestamp));

        DB::getInstance()->runQuery($query, 'INSERT');
        $_SESSION['post_create_success'] = 'Post created successfully!';
        header("location:" . ROOT_PATH . 'index.php?page=create_post');
    }

    /*Getters*/
    public function getTable()
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
    public function setTable(string $table)
    {
        $this->table = $table;
    }

    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }



}