<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
     <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row" style="margin-top:45px">
        <div class= "col-md-4 col-md-offset-4">
    <?php
    if(isset($_SESSION['status']))
    {
         echo "<h4>".$_SESSION['status']."</h4>";
        unset($_SESSION['status']);
    }
    ?>
            <h4>Register</h4> <hr>

            <form action="<?= base_url('auth/save'); ?>" method="post">
            <?= csrf_field(); ?>
            <?php if(!empty (session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if(!empty (session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>        
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter full name" value="<?= set_value ('name'); ?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
                </div>
                
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email" value="<?= set_value ('email'); ?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>

                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password" value="<?= set_value ('password'); ?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>

                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm password" value="<?= set_value ('cpassword'); ?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>

                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit"> Register</button>
                </div>
            </form>
            <br>
            <a href="<?= site_url('auth'); ?>"> Have an account? Log in</a>

        </>
</div>
</div>
</form>
</body>
</html>