<?php
/* Kontrollon nese logini mund te kryhet me sukses, nese username dhe passwordi qe ka shkruar useri ne Index.php gjindet ne db ne MySQL */
	session_start();
	include("konfiguro.php"); //Establishing connection with our database
	
	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["Perdoruesi"]) || empty($_POST["Fjalkalimi"]))
		{
			$error = "Both fields are required.";
		}else
		{
			// Define $username and $password
			$Perdoruesi=$_POST['Perdoruesi'];
			$Fjalkalimi= MD5($_POST['Fjalkalimi']);
			//Check username and password from database
			$sql="SELECT ID_p FROM umpgjk_perdoruesit WHERE Perdoruesi='$Perdoruesi' 
			and Fjalkalimi= '$Fjalkalimi'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['perdoruesi'] = $Perdoruesi; // Initializing Session
				header("location: shtepia_admin.php"); // Redirecting To Other Page
			}else
			{
				$error = "Gabim në perdoruesin ose fjalkalimin.";
			}
		}
	}
?>