<?php 
session_start();
include_once('config.php');
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM kompanite WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $id= $fetch_info['id'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: index.php');
}
?>