<?php
//including the database connection file
include("konfiguro.php");

//getting uid of the data from url
$ID_rezervimi = $_GET['ID_rezervimi'];

//deleting the row from table
$result = mysqli_query($conn,"CALL fshiRez('$ID_rezervimi')");

//redirecting to the display page (index.php in our case)
header("Location:fshi_rezervime.php");
?>