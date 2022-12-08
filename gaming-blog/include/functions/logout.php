<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['logged'])) {
    header("location:" . ROOT_PATH . 'index.php?page=home');
} else{
    session_unset();
    $_SESSION['logout_success'] = 'You logged out successfully!';
    header("location:" . ROOT_PATH . 'index.php?page=home');
}