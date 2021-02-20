<?php 
// requier our db connection to use any SQL statement
require("config/dbh.php");
// start a session

session_start();

if(isset($_GET['id']) && isset($_SESSION['email']) && isset($_COOKIE['email'])){
    $email = $_SESSION['email'];

    // update the active column in our db to 0
    $query = mysqli_query($conn, "UPDATE user_auth SET active=0 WHERE email='$email'");
    if($query){
        // destroy session and unset session

        session_unset();
        session_destroy();

        // destrioy cookie
        setcookie("email", $email, time()-1);
        header("location: index.php");
        die;
    }else{
        header("location: login.php?err=Something went wrong");
        die;
    }
}
else{
    header("location: index.php");
    die;
}

?>