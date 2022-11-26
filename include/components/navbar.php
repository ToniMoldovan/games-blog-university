<nav id="my-nav" class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand" href="#">
        <img src="<?php echo ROOT_PATH . 'assets/img/blog_logo_2.png';?>" width="200px" alt="blog_logo">
    </a>
    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-lg-center justify-content-md-center justify-content-left" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link hover-link" href="index.php?page=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-link" href="index.php?page=about">About</a>
            </li>

            <?php if (!isset($_SESSION['logged'])):  //Guest user menu ?>
                <li class="nav-item">
                    <a class="nav-link hover-link" href="index.php?page=register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-link" href="index.php?page=login">Login</a>
                </li>
            <?php endif;?>

            <?php if (isset($_SESSION['logged'])): //Logged user menu ?>
                <li class="nav-item">
                    <a class="nav-link hover-link" href="index.php?page=account">My Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-link" href="index.php?page=create_post">Create Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-link" href="index.php?page=my_posts">My Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-link" href="<?php echo ROOT_PATH.'include/functions/logout.php';?>">Logout</a>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link hover-link" href="index.php?page=contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>