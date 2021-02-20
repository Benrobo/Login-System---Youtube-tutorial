<?php require('config/dbh.php'); ?>

<?php require('inc/head.php'); ?>

<?php require('inc/nav.php'); ?>

<?php  session_start();?>

<header class="header p-5">
    <div class="overlay">
        <div class="buttons">
            <?php if(!isset($_COOKIE['email'])){?>
            <a href="login.php" class="btn btn-info">Login</a>
            <a href="signup.php" class="btn btn-primary">Signup</a>
            <?php }else if(isset($_COOKIE['email'])){?>
            <a href="logout.php?id=123" class="btn btn-danger">Logout</a>
            <?php }?>
        </div>

        <div class="text">
            <?php if(!isset($_COOKIE['email'])){?>
            <h1 class="display-4 mt-2">Login or Signup</h1>
            <span class="badge badge-danger">Logged out</span>
            <?php }else if(isset($_COOKIE['email'])){?>
                <h1 class="mt-2 display-4">You are logged in </h1>
                <span class="badge badge-success">Logged in</span>
            <?php }?>
        </div>
    </div>
</header>

<?php require('inc/footer.php'); ?>
