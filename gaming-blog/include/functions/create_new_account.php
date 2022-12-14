<?php
require_once '../../config.php';
include_once '../classes/User.php';

if (isset($_POST['submit'])) {
    //echo $_POST['email'] . ' ' . $_POST['name'] . ' ' . $_POST['password'] . ' ' . $_POST['gender'];
    //Validating data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING), ' ');
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];

    $newUser = new User($email, $name, $password, $gender);
    $newUser->store();
}

