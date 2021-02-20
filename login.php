<?php require('inc/head.php'); ?>

<?php require('inc/nav.php'); ?>

<div class="form-cont">
    <form action="login_val.php" method="post" class="form-group">
        <h2>Login to your account.</h2>
        <?php if(isset($_GET['err'])){?>
            <p class="text-danger"><?php echo $_GET['err']; ?></p>
        <?php }else if(isset($_GET['msg'])){?>
            <p class="text-success"><?php echo $_GET['msg']; ?></p>
        <?php }?>
        <label>Email</label>
        <input type="text" name="email" class="form-control m-1">
        <label>Password</label>
        <input type="password" name="pwd" class="form-control m-1">

        <input type="submit" value="Login" name="submit" class="btn btn-info btn-block">

        <span><small>Dont have an account? <a href="signup.php">Signup</a></small></span>
        <span><small>Forgot password? <a href="forgot_pwd.php">Reset password</a></small></span>
    </form>
</div>

<?php require('inc/footer.php'); ?>
