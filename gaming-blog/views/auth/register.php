<div class="header">
    <h1>Register now</h1>
</div>
<div class="main-container">
    <div class="container">
        <form method="POST" action="<?php echo ROOT_PATH.'include/functions/create_new_account.php';?>">
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
                <!--Name-->
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <input name="name" type="text" class="form-control" placeholder="Your nickname (how your friends call you)">
                </div>

                <!--Gender-->
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <select name="gender" id="gender" class="form-control">
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                        <option value="empty">Not specified</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <input id="submitBtn" type="submit" name="submit" value="Register" class="btn w-100 mt-lg-4 mt-md-4 mt-2">
                </div>
            </div>
        </form>
    </div>
</div>