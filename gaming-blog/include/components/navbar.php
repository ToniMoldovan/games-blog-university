<nav id="my-nav" class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">

        <a class="navbar-brand" href="index.php?page=home">
            <img src="<?php echo ROOT_PATH . 'assets/img/blog_logo_2.png';?>" width="200px" alt="blog_logo">
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-lg-center justify-content-md-center justify-content-left" id="navbarNavDropdown">
            <ul class="navbar-nav" id="normal-links"">
                <li class="nav-item">
                    <a class="nav-link hover-link" href="index.php?page=home">Home</a>
                </li>

                <?php if (!isset($_SESSION['logged'])):  //Guest user menu ?>
                    <li class="nav-item">
                        <a class="nav-link hover-link" href="index.php?page=register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-link" href="index.php?page=login">Login</a>
                    </li>
                <?php endif;?>
            </ul>

            <?php if (isset($_SESSION['logged'])): //Logged user menu ?>
            <ul class="navbar-nav ml-auto" id="profile-links">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo ROOT_PATH . 'assets/img/svg/profile-svgrepo-com.svg' ?>" style="margin-right: 10px;width: 22px;" alt="profile_icon"><?php echo $_SESSION['user_name']; ?>
                    </a>
                    <div class="dropdown-menu" style="border-radius: 0;" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="index.php?page=account">My Account</a>
                        <a class="dropdown-item" href="index.php?page=create_post">Create Post</a>
                        <a class="dropdown-item" href="index.php?page=my_posts">My Posts</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo ROOT_PATH.'include/functions/logout.php';?>">Logout</a>
                    </div>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item" id="accounts-holder">
                    <div >
                        <div class="blob green"></div>
                        <p class="nav-link disabled" id="navbar-registered-acc">Accounts: <?php echo $usersCount; ?></p>
                    </div>
                </li>
            </ul>
            <?php endif; ?>


        </div>

    </div>
</nav>