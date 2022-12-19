<?php

$posts = Post::getPostsByUID($_SESSION['user_id']);

?>

<div class="header">
    <h1>My posts</h1>
</div>
<div class="main-container">
    <!--#region SESSION_MESSAGES-->

    <?php
    if (isset($_SESSION['post_no_exist'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['post_no_exist']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        unset($_SESSION['post_no_exist']); //Clears the register message error
    endif;

    /*Error messages END*/ ?>

    <!--#endregion SESSION_MESSAGES-->


</div>