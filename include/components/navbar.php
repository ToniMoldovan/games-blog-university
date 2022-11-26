<nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=about">About</a>
            </li>

            <?php if (!isset($_SESSION['logged'])):  //Guest user menu ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=login">Login</a>
                </li>
            <?php endif;?>

            <?php if (isset($_SESSION['logged'])): //Logged user menu ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=account">My Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=create_post">Create Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=my_posts">My Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_PATH.'include/functions/logout.php';?>">Logout</a>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="index.php?page=contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>