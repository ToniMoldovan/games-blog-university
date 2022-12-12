<?php
require_once '../../config.php';
include_once '../classes/Post.php';

if (isset($_POST['submit'])) {
    if (!isset($_COOKIE['create_post_timeout'])) {
        // User CAN POST
        $title = $_POST['title'];
        $content = $_POST['content'];
        $img_default = ROOT_PATH . 'assets/img/blog_no_image.jpg';

        if (strlen($title) < 6) {
            $_SESSION['title_length_error_1'] = "Title can't be less than <strong>6 characters.</strong>";
            header('Location:' . ROOT_PATH . 'index.php?page=create_post');
        }
        elseif (strlen($content) < 60) {
            $_SESSION['content_length_error_1'] = "Content can't be less than <strong>60 characters.</strong>";
            header('Location:' . ROOT_PATH . 'index.php?page=create_post');
        }
        else {
            /*echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            die;*/

            $newPost = new Post($title, $content, $img_default, $_SESSION['user_id']);
            $newPost->store();

            setcookie('create_post_timeout', date('H:i:s'), time() + (10), '/');
        }
    }
    else {
        //User CAN'T POST
        $_SESSION['post_timeout'] = "You can't post now. Wait a few more seconds!<br>Your last post was at <strong>[".$_COOKIE['create_post_timeout']."]</strong>";
        header('Location:' . ROOT_PATH . 'index.php?page=create_post');
    }



        //TODO: check if user is logged first.


}
