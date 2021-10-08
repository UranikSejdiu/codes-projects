<?php
//including the database connection file
include("konfiguro.php");

//getting uid of the data from url
$meny_id = $_GET['meny_id'];

//deleting the row from table
$result = mysqli_query($conn,"DELETE FROM umpgjk_meny WHERE meny_id=$meny_id");

//redirecting to the display page (index.php in our case)
header("Location:fshi_meny.php");
?>