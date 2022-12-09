<?php
global $requestedPost;
?>

<div class="header">
    <h1><?php echo $requestedPost[0]['title']; ?></h1>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <!--User info's-->
            <div class="col-lg-4 col-md-4 col-12" id="left-column-article">
                <h5>User name</h5>
                <p>Posted date</p>
            </div>

            <!--Actual article-->
            <div class="col-lg-8 col-md-8 col-12" id="right-column-article">
                <p>
                    <?php echo $requestedPost[0]['content']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
