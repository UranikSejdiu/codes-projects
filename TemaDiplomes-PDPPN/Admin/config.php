<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$db = "pdppn";

$con = mysqli_connect($hostname, $username, $password, $db);
if ($con->connect_error) {
    die("Gabim ne lidhje: " .$con->connect_error);
}

$con1 = mysqli_connect($hostname, $username, $password, $db);
if ($con1->connect_error) {
    die("Gabim ne lidhje: " .$con->connect_error);
}

$con2 = mysqli_connect($hostname, $username, $password, $db);
if ($con1->connect_error) {
    die("Gabim ne lidhje: " .$con->connect_error);
}

if (!$con->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $con->error);
}

if (!$con1->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $con->error);
}

if (!$con2->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $con->error);
}
?>

