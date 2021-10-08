<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$ID_prod = $_GET['ID_prod'];

//deleting the row from table
$result = mysqli_query($conn,"DELETE FROM produktet_chsh WHERE ID_prod=$ID_prod");

//redirecting to the display page (index.php in our case)
header("Location:fshij_produkte.php");
?>

