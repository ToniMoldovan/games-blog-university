<?php
require 'config.php';
?>

<!doctype html>
<html lang="en">
<head>
    <?php include 'include/components/head.php';?>
    <title>Gaming Blog</title>
</head>

<body>

<?php include 'include/components/navbar.php'; ?>

<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
switch ($page){
    case '':
    case 'home' :
        include 'views/homepage.php';
        break;

    case 'register':
        include 'views/auth/register.php';
        break;

    case 'login':
        include 'views/auth/login.php';
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
