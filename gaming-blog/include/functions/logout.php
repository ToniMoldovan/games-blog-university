<?php
session_start();

if (!isset($_SESSION['logged'])) {
    header("Location: https://davos.science.upm.ro/~2022.moldovan.akbar.antonio/");
} else{
    session_unset();
    session_destroy();
    header("Location: https://davos.science.upm.ro/~2022.moldovan.akbar.antonio/");
}