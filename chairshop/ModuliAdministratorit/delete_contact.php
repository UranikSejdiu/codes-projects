<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$con_ID = $_GET['con_ID'];

//deleting the row from table
$result = mysqli_query($conn,"DELETE FROM contact WHERE con_ID=$con_ID");

//redirecting to the display page (index.php in our case)
header("Location:fshij_contact.php");
?>
