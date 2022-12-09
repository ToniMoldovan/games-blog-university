<?php
require_once '../../config.php';
include_once '../classes/Post.php';

if (isset($_POST['submit'])) {
    //echo $_POST['title'] . ' ' . $_POST['content'] . ' ' . $_SESSION['user_id'];
    //die;
    //Validating data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    $img_default = ROOT_PATH . 'assets/img/blog_no_image.jpg';

    //TODO: check if user is logged first.

    $newPost = new Post($title, $content, $img_default, $_SESSION['user_id']);
    $newPost->store();
}
