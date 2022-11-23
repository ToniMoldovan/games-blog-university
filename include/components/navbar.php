<nav>
    <div id="navbar">
        <ul>
            <li><a href="index.php?page=home">Home</a></li>
            <li><a href="index.php?page=about">About</a></li>
        <?php
            if (!isset($_SESSION['logged'])): ?>
                <li><a href="index.php?page=register">Register</a></li>
                <li><a href="index.php?page=login">Login</a></li>
        <?php endif;?>

        <?php
            if (isset($_SESSION['logged'])): ?>
                <li><a href="index.php?page=account">My Account</a></li>
                <li><a href="index.php?page=create_post">Create Post</a></li>
                <li><a href="index.php?page=my_posts">My Posts</a></li>
                <li><a href="<?php echo ROOT_PATH.'include/functions/logout.php';?>">Logout</a></li>
        <?php endif; ?>

            <li><a href="index.php?page=contact">Contact</a></li>
        </ul>
    </div>
</nav>