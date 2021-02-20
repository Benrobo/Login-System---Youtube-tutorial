<?php 
require("config/dbh.php");

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    // validate
    #1 check if user already exist
    $sql = "SELECT * FROM user_auth WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    $result = mysqli_fetch_assoc($query);
    $hash = $result['hash'];

    if($count == 0){
        header("location: login.php?err=User with that email doesnt exist, considering signing up");
        die;
    }
    else if(empty($email) || empty($pwd)){
        header("location: login.php?err=Fields cannot be empty");
        die;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: login.php?err=Email given is incorrect");
        die;
    }
    else if(!password_verify($pwd, $hash)){
        header("location: login.php?err=Password given is incorrect");
        die;
    }
    else{

        $query = mysqli_query($conn, "UPDATE user_auth SET active=1 WHERE email='$email'");
        if($query){
            // set a session variable
            session_start();
            // set cookie
            setcookie('email',$email, time()+8694000);
            $_SESSION['email'] = $result['email'];

            header("location: index.php");
            die;
        }else{
            header("location: login.php?err=Something went wrong");
            die;
        }
    }
}else{
    header("location: index.php");
    die();
}


?>