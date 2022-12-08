<div class="header">
    <h1>Welcome, friend!</h1>
</div>
<div class="main-container">
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
    endif; ?>

    <div id="blog-articles-container" class="container-fluid">
        <h2 class="page-heading">Latest blogs</h2>
        <p class="page-subheading">Check out other people opinions about their favourite games.</p>

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