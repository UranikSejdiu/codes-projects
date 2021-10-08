<?php
//including the database connection file
include("konfiguro.php");

//getting uid of the data from url
$ID_tedhena = $_GET['ID_tedhena'];

//deleting the row from table
$result = mysqli_query($conn,"CALL fshiTeDhena('$ID_tedhena')");

//redirecting to the display page (index.php in our case)
header("Location:fshi_tedhena.php");
?>
