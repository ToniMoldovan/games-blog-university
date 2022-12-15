<div class="header">
    <h1>My account</h1>
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
                    <p><img src="<?php echo ROOT_PATH . 'assets/img/svg/calendar-svgrepo-com.svg'; ?>" alt="calendar-icon-svg" width="16px">
                        <?php echo date_format($postedDate, "[Y] M. j ".$at." g:i A"); ?>
                    </p>
                </div>
            </div>

            <!--Actual article-->
            <div class="col-lg-8 col-md-8 col-12" id="right-column-article">
                <div class="container" id="post-container">
                    <?php echo $requestedPost[0]['content']; ?>
                </div>
            </div>
        </div>
    </div>
</div>