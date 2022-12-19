<?php

require_once 'DB.php';

class Post
{
    public $table = 'posts';

    private $uid;
    private $title;
    private $gameType;
    private $content;
    private $img;

    function __construct($title, $game_type, $content, $img_url, $user_id)
    {
        $this->title = $title;
        $this->gameType = $game_type;
        $this->content = $content;
        $this->img = $img_url;
        $this->uid = $user_id;
    }

    public function showAll()
    {
        $query = "SELECT * FROM '" . $this->table . "'";
    }

    /**
     * @param $ascending bool
     * @return array|null|boolean
     */
    public static function getAllPosts($ascending)
    {
        $result = null;

        if ($ascending === false)
            $query = "SELECT * FROM posts ORDER BY created_at DESC;";
        else
            $query = "SELECT * FROM posts ORDER BY created_at ASC;";

        $stmt = DB::getInstance()->prepareStatement($query);

        if ($stmt->execute())
        {
            $data = $stmt->get_result();
            $result = $data->fetch_all(MYSQLI_ASSOC);

            if (count($result) < 1) {
                return false;
            }
        }

        return $result;
    }

    public static function postExists($post_id)
    {
        $query = "SELECT * FROM posts WHERE id = ?";
        $result = null;

        $stmt = DB::getInstance()->prepareStatement($query);
        $stmt->bind_param('i', $post_id);

        if ($stmt->execute()) {
            $data = $stmt->get_result();
            $result = $data->fetch_all(MYSQLI_ASSOC);

            if (count($result) != 1) {
                $_SESSION['post_no_exist'] = 'This post ID <strong>[' . $post_id . ']</strong> doesn\'t exist. Please try again.';
                header("location:" . ROOT_PATH . 'index.php?page=home');
                return false;
            }
        }

        return $result;
    }

    public static function getPostsByCategory($cat)
    {
        $query = "SELECT * FROM posts WHERE game_type = ? ORDER BY created_at ASC;";
        $result = null;

        $stmt = DB::getInstance()->prepareStatement($query);
        $stmt->bind_param('s', $cat);

        if ($stmt->execute()) {
            $data = $stmt->get_result();
            $result = $data->fetch_all(MYSQLI_ASSOC);

            if (count($result) < 1) {
                $_SESSION['post_no_exist'] = "You have no posts.";
                //header("location:" . ROOT_PATH . 'index.php?page=my_posts');
                return false;
            }
        }

        return $result;
    }

    public static function getPostsByUID($uid)
    {
        $query = "SELECT * FROM posts WHERE user_id = ?;";
        $result = null;

        $stmt = DB::getInstance()->prepareStatement($query);
        $stmt->bind_param('i', $uid);

        if ($stmt->execute()) {
            $data = $stmt->get_result();
            $result = $data->fetch_all(MYSQLI_ASSOC);

            if (count($result) < 1) {
                $_SESSION['post_no_exist'] = "You have no posts.";
                //header("location:" . ROOT_PATH . 'index.php?page=my_posts');
                return false;
            }
        }

        return $result;
    }

    public function store()
    {
        $timestamp = date("Y-m-d H:i:s");

        $query = "INSERT INTO posts (user_id, title, game_type, content, image, created_at) VALUES (?,?,?,?,?,?);";
        $stmt = DB::getInstance()->prepareStatement($query);
        $stmt->bind_param('isssss', $this->uid, $this->title, $this->gameType, $this->content, $this->img, $timestamp);

        if ($stmt->execute()) {
            $_SESSION['post_create_success'] = 'Post created successfully! You can post again after <strong>10 seconds.</strong>';
            header("location:" . ROOT_PATH . 'index.php?page=create_post');
        } else {

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