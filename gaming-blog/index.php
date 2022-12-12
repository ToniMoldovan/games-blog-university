<?php
require_once 'config.php';
require_once 'include/classes/DB.php';
require_once 'include/classes/Post.php';
require_once 'include/classes/User.php';

$usersCount = count(User::selectAll());

?>

<!doctype html>
<html lang="en">
<head>
    <?php include 'include/components/head.php';?>
    <title>Gaming Blog</title>
</head>

<body class="d-flex flex-column">

<?php include 'include/components/navbar.php'; ?>

<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$post = isset($_GET['post_id']) ? $_GET['post_id'] : 0;

switch ($page){
    case '':
    case 'home' :
        include 'views/homepage.php';
        break;

    case 'register':
        if (isLogged()) {
            header("location:" . ROOT_PATH . 'index.php?page=home');
        }
        else {
            include 'views/auth/register.php';
        }
        break;

    case 'login':
        if (isLogged()) {
            header("location:" . ROOT_PATH . 'index.php?page=home');
        }
        else {
            include 'views/auth/login.php';
        }
        break;

    case 'create_post':
        if (isLogged()) {
            include 'views/blog/store.php';
        }
        else {
            header("location:" . ROOT_PATH . 'index.php?page=home');
        }
        break;

    case 'post':
        //echo $post;
        if ($post < 1) {
            $_SESSION['post_no_exist'] = 'This post id doesn\'t exist.';
            header("location:" . ROOT_PATH . 'index.php?page=home');
        }
        else {
            $requestedPost = Post::postExists($post);
            if ($requestedPost !== false) {
                include 'views/blog/post.php';
                //var_dump($requestedPost);
                //die;
            }
        }
        break;

    default:
        echo '<h1>404 ERROR</h1>';
        break;
}

?>

<?php include 'include/components/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
