<?php
include_once '../classes/User.php';

if (isset($_POST['submit'])) {
    //Validating data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_ARGON2ID);
    $gender = $_POST['gender'];

    $newUser = new User($email, $name, $password, $gender);
    $newUser->store();
}

