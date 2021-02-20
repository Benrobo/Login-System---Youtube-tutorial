<?php require('inc/head.php'); ?>

<?php require('inc/nav.php'); ?>

<div class="form-cont">
    <form action="signup_val.php" method="post" class="form-group">
        <h2>Signup to your account.</h2>
        <?php if(isset($_GET['err'])){?>
            <p class="text-danger"><?php echo $_GET['err']; ?></p>
        <?php }else if(isset($_GET['msg'])){?>
            <p class="text-success"><?php echo $_GET['msg']; ?></p>
        <?php }?>
        <label>Username</label>
        <input type="text" name="username" class="form-control m-1">
        <label>Email</label>
        <input type="email" name="email" class="form-control m-1">
        <label>Password</label>
        <input type="password" name="pwd" class="form-control m-1">
        <label>Confirm password</label>
        <input type="password" name="conpwd" class="form-control m-1">

        <input type="submit" value="Signup" name="submit" class="btn btn-info btn-block">

        <span><small>have an account? <a href="login.php">Login</a></small></span>
    </form>
</div>

<?php require('inc/footer.php'); ?>