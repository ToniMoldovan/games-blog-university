<?php

?>

<div class="header">
    <h1>Create Article</h1>
</div>
<div class="main-container">
    <div class="container">

        <?php /*Error messages START*/
        //TODO: config alert messages
        if (isset($_SESSION['register_message_error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['register_message_error']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            unset($_SESSION['register_message_error']); //Clears the register message error
        endif;

        if (isset($_SESSION['post_create_success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['post_create_success']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            unset($_SESSION['post_create_success']); //Clears the register message success
        endif;

        /*Error messages END*/ ?>

        <form method="POST" action="<?php echo ROOT_PATH.'include/functions/create_new_post.php';?>">
            <div class="row">
                <!--Title-->
                <div class="col-12 mb-3">
                    <input name="title" type="text" class="form-control" minlength="6" maxlength="60" placeholder="Title">
                </div>
            </div>

            <div class="row">
                <!--Content-->
                <div class="col-12 mb-3">
                    <textarea id="editor1" name="content" class="form-control" minlength="60" rows="4" placeholder="Content" content=""></textarea>
                    <script>
                        CKEDITOR.replace( 'editor1' );
                    </script>
                </div>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <input id="submitBtn" type="submit" name="submit" value="Create Article" class="btn w-100 mt-lg-4 mt-md-4 mt-2">
                </div>
            </div>
        </form>
    </div>
</div>
