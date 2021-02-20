<?php 
require("config/dbh.php");

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $conpwd = mysqli_real_escape_string($conn, $_POST['conpwd']);

    // validate
    #1 check if user already exist
    $sql = "SELECT * FROM user_auth WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    
    if($count > 0){
        header("location: signup.php?err=User with that email already exist");
        die;
    }
    else if(empty($username) || empty($email) || empty($pwd) || empty($conpwd)){
        header("location: signup.php?err=Fields cannot be empty");
        die;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: signup.php?err=Email given is incorrect");
        die;
    }
    else if($pwd != $conpwd){
        header("location: signup.php?err=Password must be equal");
        die;
    }
    else{
        $newpwd = md5($pwd);
        $hash = password_hash($pwd, PASSWORD_BCRYPT);

        $query = mysqli_query($conn, "INSERT INTO user_auth(username,email,password,hash) VALUES('$username','$email','$newpwd','$hash')");
        if($query){
            header("location: login.php");
            die;
        }else{
            header("location: signup.php?err=Something went wrong");
            die;
        }
    }
}else{
    header("location: index.php");
    die();
}


?>