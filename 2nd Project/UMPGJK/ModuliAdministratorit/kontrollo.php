<?php
/* Kontrollon sesionin */
include('konfiguro.php');
session_start();
$user_check=$_SESSION['perdoruesi'];
$ses_sql = mysqli_query($conn,"SELECT Perdoruesi FROM umpgjk_perdoruesit WHERE Perdoruesi='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$row['Perdoruesi'];
if(!isset($user_check))
{ header("Location: index.php");} 
?>