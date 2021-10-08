<?php

include("config.php");

$ID_usr = $_GET['ID_usr'];

$result = mysqli_query($conn,"DELETE FROM users WHERE ID_usr=$ID_usr");


header("Location:fshij_perdorues.php");
?>

