<?php
require_once '../../config.php';
include_once '../classes/Post.php';

if (isset($_POST['submit'])) {
    if (!isset($_COOKIE['create_post_timeout'])) {
        // User CAN POST
        $title = $_POST['title'];
        $content = $_POST['content'];
        $game_type = $_POST['game_type'];
        $img_default = "";

        switch ($game_type) {
            case 'moba':
                $img_default = ROOT_PATH . 'assets/img/blog/post_categories/moba.jpg';
                break;
            case 'mmorpg':
                $img_default = ROOT_PATH . 'assets/img/blog/post_categories/mmorpg.jpg';
                break;
            case 'shooter':
                $img_default = ROOT_PATH . 'assets/img/blog/post_categories/shooter.jpg';
                break;
            default:
                $img_default = ROOT_PATH . 'assets/img/blog_no_image.jpg';
                break;
        }

        if (strlen($title) < 6) {
            $_SESSION['title_length_error_1'] = "Title can't be less than <strong>6 characters.</strong>";
            header('Location:' . ROOT_PATH . 'index.php?page=create_post');
        }
        elseif (strlen($content) < 60) {
            $_SESSION['content_length_error_1'] = "Content can't be less than <strong>60 characters.</strong>";
            header('Location:' . ROOT_PATH . 'index.php?page=create_post');
        }
        else {
            $newPost = new Post($title, $game_type, $content, $img_default, $_SESSION['user_id']);
            $newPost->store();

            setcookie('create_post_timeout', date('H:i:s'), time() + (10), '/');
        }
    }
    else {
        //User CAN'T POST
        $_SESSION['post_timeout'] = "You can't post now. Wait a few more seconds!<br>Your last post was at <strong>[".$_COOKIE['create_post_timeout']."]</strong>";
        header('Location:' . ROOT_PATH . 'index.php?page=create_post');
    }
}
