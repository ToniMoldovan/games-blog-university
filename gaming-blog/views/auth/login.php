<div class="header">
    <h1>Login Now</h1>
</div>
<div class="main-container">
    <div class="container">
        <?php /*Error messages START*/

        if (isset($_SESSION['login_email_error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['login_email_error']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            unset($_SESSION['login_email_error']);
        endif;

        if (isset($_SESSION['not_logged'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['not_logged']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            unset($_SESSION['not_logged']);
        endif;

        if (isset($_SESSION['login_pw_error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['login_pw_error']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            unset($_SESSION['login_pw_error']);
        endif;
        /*Error messages END*/ ?>
        <form method="POST" action="<?php echo ROOT_PATH.'include/functions/login.php';?>">
            <div class="row">
                <!--Email-->
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                </div>

                <!--Password-->
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <input id="submitBtn" type="submit" name="submit" value="Login" class="btn w-100 mt-lg-4 mt-md-4 mt-2">
                </div>
            </div>
        </form>
    </div>
</div>