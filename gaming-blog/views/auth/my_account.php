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
            <div class="col-lg-8 col-md-8 col-12 mt-lg-0 mt-md-0 mt-5" id="right-column-article">
                <div class="container">
                    <h3 class="pb-3">Change your password</h3>
                    <form method="POST" action="<?php echo ROOT_PATH.'include/functions/change_password.php';?>">
                        <div class="row">
                            <!--Old password-->
                            <div class="col-12 mb-3">
                                <input required name="old_password" type="password" class="form-control" placeholder="Old password">
                            </div>
                        </div>

                        <div class="row">
                            <!-- New password-->
                            <div class="col-12 mb-3">
                                <input required name="new_password" type="password" class="form-control" placeholder="New password">
                            </div>
                        </div>

                        <div class="row">
                            <!--Confirm new password-->
                            <div class="col-12 mb-3">
                                <input required name="confirm_new_password" type="password" class="form-control" placeholder="Confirm new password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 ">
                                <input id="submitBtn" type="submit" name="submit" value="Change password" class="btn w-100 mt-lg-4 mt-md-4 mt-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>