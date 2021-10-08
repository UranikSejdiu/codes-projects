<?php
//including the database connection file
include("konfiguro.php");

//getting uid of the data from url
$ID_p = $_GET['ID_p'];

//deleting the row from table
$result = mysqli_query($conn,"CALL fshiPrd('$ID_p')");

//redirecting to the display page (index.php in our case)
header("Location:fshi_perdorues.php");
?>