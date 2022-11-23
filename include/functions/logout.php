<?php
session_start();

if (!isset($_SESSION['logged'])) {
    header("Location: https://davos.science.upm.ro/~2022.moldovan.akbar.antonio/");
} else{
    session_unset();
    header("Location: https://davos.science.upm.ro/~2022.moldovan.akbar.antonio/");
}