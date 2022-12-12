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
            $_SESSION['post_no_exist'] = 'This post ID <strong>['.$post_id.']</strong> doesn\'t exist. Please try again.';
            header("location:" . ROOT_PATH . 'index.php?page=home');
            return false;
        }

        return $result;
    }

    public function store() {
        $timestamp = date("Y-m-d H:i:s");

        $query = "INSERT INTO posts (user_id, title, content, image, created_at) VALUES (?,?,?,?,?);";
        $stmt = DB::getInstance()->prepareStatement($query);
        $stmt->bind_param('issss', $this->uid, $this->title, $this->content, $this->img, $timestamp);

        if ($stmt->execute())
        {
            $_SESSION['post_create_success'] = 'Post created successfully! You can post again after <strong>10 seconds.</strong>';
            header("location:" . ROOT_PATH . 'index.php?page=create_post');
        }
        else
        {
            echo 'err preapred statements: ' . print_r($stmt->error_list, 1);
        }
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