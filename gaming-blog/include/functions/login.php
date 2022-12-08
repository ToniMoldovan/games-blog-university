<?php
require_once '../../config.php';
require_once '../classes/User.php';

if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $user = User::getUserByEmail($email);

    if ($user !== false) {
        if (password_verify($password, $user[0]['password'])) {
            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['user_email'] = $user[0]['email'];
            $_SESSION['user_name'] = $user[0]['name'];
            $_SESSION['user_gender'] = $user[0]['gender'];

            $_SESSION['login_success'] = 'You logged in successfully!';
            header("location:" . ROOT_PATH . 'index.php?page=home');
        }
        else {
            $_SESSION['login_pw_error'] = 'Password incorrect. Please try again.';
            header("location:" . ROOT_PATH . 'index.php?page=login');
        }

    }

}

