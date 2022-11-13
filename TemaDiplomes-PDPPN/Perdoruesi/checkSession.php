<?php
session_start();
include_once('config.php');

if (isset($_SESSION['email']) || isset($_SESSION['password'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM perdoruesit WHERE email = '$email'";
    
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $id = $fetch_info['id'];
        $fullName = $fetch_info['fullName'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: reset-code.php');
            }
        } else {
            header('Location: user-otp.php');
        }
    }
}
