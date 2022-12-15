<div class="header">
    <h1>Welcome, friend!</h1>
</div>
<div class="main-container">
    <!--#region Session Messages-->
    <?php
    if (isset($_SESSION['login_success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['login_success']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        unset($_SESSION['login_success']); //Clears the register message success
    endif;

    if (isset($_SESSION['logout_success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['logout_success']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        unset($_SESSION['logout_success']); //Clears the register message success
    endif;

    if (isset($_SESSION['post_no_exist'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['post_no_exist']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        unset($_SESSION['post_no_exist']); //Clears the register message success
    endif;
    ?>
    <!--#endregion Session Messages-->

    <div id="blog-articles-container" class="container-fluid">
        <h2 class="page-heading">Latest blogs</h2>
        <p class="page-subheading">Check out other people opinions about their favourite games.</p>

        <div class="page-article-row" style="margin-top:64px;">
            <div class="row article-row">
                <?php
                    $posts = Post::getAllPosts(false);

                    for ($i = 0; $i < 3; $i++): ?>
                        <?php
                        $user = User::getUserByID($posts[$i]['user_id']);
                        ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                                <a href="<?php echo 'index.php?page=post&post_id=' . $posts[$i]['id']; ?>">
                                    <img class="card-img-top" src="<?php echo $posts[$i]['image']; ?>" width="200px" alt="blog_no_image">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $posts[$i]['title']; ?></h5>
                                    <p class="card-text">
                                        <?php
                                            $string = strip_tags($posts[$i]['content']);
                                            $wordCount = 0;
                                            foreach (explode(' ', $string) as $word) {
                                                if (strlen($word) > 5)
                                                {
                                                    if ($wordCount > 11) break;
                                                    else {
                                                        echo $word . ' ';
                                                    }
                                                }
                                                else
                                                {
                                                    if (strlen($word) < 8) {
                                                        if ($wordCount > 18) break;
                                                        else {
                                                            echo $word . ' ';
                                                        }
                                                    }
                                                }
                                                $wordCount++;

                                            }
                                        ?>
                                    ...</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last edited<strong>
                                        <?php
                                        $oldDate = new DateTime($posts[$i]['created_at']);
                                        $newDate = new DateTime(date("Y-m-d H:i:s"));
                                        $diff = $newDate->diff($oldDate);
                                        /*echo '<pre>';
                                        print_r($diff);
                                        echo '</pre>';*/


                                        if ($diff->i < 1) {
                                            echo $diff->s . ' seconds ';
                                        }
                                        elseif ($diff->h < 1) {
                                            echo $diff->i . ' minutes ';
                                        }
                                        elseif ($diff->d < 1) {
                                            if ($diff->h == 1) echo $diff->h . ' hour ';
                                            else echo $diff->h . ' hours ';
                                        }
                                        elseif ($diff->d >= 1) {
                                            if ($diff->d == 1) echo $diff->d . ' day ';
                                            else echo $diff->d . ' days ';
                                        }
                                        ?>
                                        ago</strong> by <strong><?php echo $user[0]['name']; ?></strong></small>
                                </div>
                            </div>
                        </div>
                <?php endfor;
                ?>
            </div>
        </div>

        <div class="page-article-row">
            <h4 class="articles-category-heading heading-underline d-inline-block">MMORPG</h4>
            <button type="button" class="btn btn-primary see-more-btn">See more</button>
            <div class="row article-row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                        <img class="card-img-top" src="<?php echo ROOT_PATH . 'assets/img/blog_no_image.jpg'; ?>" width="200px" alt="blog_no_image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago by Admin</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                        <img class="card-img-top" width="200px" src="<?php echo ROOT_PATH . 'assets/img/blog_no_image.jpg'; ?>" alt="blog_no_image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago by Admin</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                        <img class="card-img-top" width="200px" src="<?php echo ROOT_PATH . 'assets/img/blog_no_image.jpg'; ?>" alt="blog_no_image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago by Admin</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-article-row">
            <h4 class="articles-category-heading heading-underline d-inline-block">MOBA</h4>
            <button type="button" class="btn btn-primary see-more-btn">See more</button>
            <div class="row article-row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                        <img class="card-img-top" src="<?php echo ROOT_PATH . 'assets/img/blog_no_image.jpg'; ?>" width="200px" alt="blog_no_image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                        <img class="card-img-top" width="200px" src="<?php echo ROOT_PATH . 'assets/img/blog_no_image.jpg'; ?>" alt="blog_no_image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                        <img class="card-img-top" width="200px" src="<?php echo ROOT_PATH . 'assets/img/blog_no_image.jpg'; ?>" alt="blog_no_image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-article-row">
            <h4 class="articles-category-heading heading-underline d-inline-block">Shooters</h4>
            <button type="button" class="btn btn-primary see-more-btn">See more</button>

            <div class="row article-row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                        <img class="card-img-top" src="<?php echo ROOT_PATH . 'assets/img/blog_no_image.jpg'; ?>" width="200px" alt="blog_no_image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                        <img class="card-img-top" width="200px" src="<?php echo ROOT_PATH . 'assets/img/blog_no_image.jpg'; ?>" alt="blog_no_image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card article-card mx-lg-2 mx-0 mb-lg-0 mb-md-0 mb-5">
                        <img class="card-img-top" width="200px" src="<?php echo ROOT_PATH . 'assets/img/blog_no_image.jpg'; ?>" alt="blog_no_image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>