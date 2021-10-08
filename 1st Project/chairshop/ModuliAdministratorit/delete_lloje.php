<?php

include("config.php");

$ID_llojet = $_GET['ID_llojet'];

$result = mysqli_query($conn,"DELETE FROM llojet_chsh WHERE ID_llojet=$ID_llojet");


header("Location:fshij_lloje.php");
?>
