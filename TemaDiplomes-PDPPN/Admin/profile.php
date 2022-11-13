<?php  include_once('checkSession.php');
$email = $_SESSION['email'];
$sql = $sql = "SELECT * FROM admin WHERE email = '$email'";
$run_Sql = mysqli_query($con, $sql);
if($run_Sql){
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    echo "Emri juaj ". $fetch_info['name']." dhe id juaj ". $fetch_info['id'];
}

?>





