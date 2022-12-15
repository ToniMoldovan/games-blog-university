<?php

$user = User::getUserByID($_SESSION['user_id']);

?>

<div class="header">
    <h1>Dashboard</h1>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <!--User info's-->
            <div class="col-lg-4 col-md-4 col-12" id="left-column-article">
                <div class="container" id="author-container">
                    <h5><img src="<?php echo ROOT_PATH . 'assets/img/svg/black-profile-svgrepo-com.svg'; ?>" alt="profile-icon-svg" width="16px">
                        <?php echo $user[0]['name']; ?>
                    </h5>
                    <p>
                        <img src="<?php echo ROOT_PATH . 'assets/img/svg/email-svgrepo-com.svg'; ?>" alt="email-icon-svg" width="16px">
                        <?php echo $user[0]['email']; ?>
                    </p>
                    <hr>
                    <p>
                        <img src="<?php echo ROOT_PATH . 'assets/img/svg/gender-svgrepo-com.svg'; ?>" alt="email-icon-svg" width="24px">
                        <strong>Gender:</strong>
                        <img src="
                        <?php
                        if ($user[0]['gender'] == 'male') echo ROOT_PATH . 'assets/img/svg/user-male-svgrepo-com.svg';
                        elseif ($user[0]['gender'] == 'female') echo ROOT_PATH . 'assets/img/svg/woman-user-svgrepo-com.svg';
                        else echo ROOT_PATH . 'assets/img/svg/camel-svgrepo-com.svg';
                        ?>" alt="profile-icon-svg" style="margin-left: 2%" width="42px">
                    </p>
                    <hr>
                    <span class="user_rank">
                        <img src="<?php echo ROOT_PATH . 'assets/img/blog/ranks/'.$user[0]['rank'].'.png'; ?>" alt="user-rank">
                    </span>
                </div>
            </div>

            <!--Actual article-->
            <div class="col-lg-8 col-md-8 col-12" id="right-column-article">

            </div>
        </div>
    </div>
</div>