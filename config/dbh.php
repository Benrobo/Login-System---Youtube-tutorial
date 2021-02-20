<?php 

$host = "localhost";
$root = "root";
$pwd = null;
$db_name = "login_system";

$conn = mysqli_connect($host, $root, $pwd, $db_name);

if($conn){
    // echo "Connected";
}else{
    echo "An error occur".mysqli_error($conn);
}

?>