<?php
include 'config.php';
?>

<!doctype html>
<html lang="en">
<head>
    <?php include 'include/components/head.php';?>
    <title>Games Blog</title>
</head>

<body>

<?php include 'include/components/navbar.php'; ?>

<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
switch ($page){
    case '':
    case 'home':
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
</body>
</html>
