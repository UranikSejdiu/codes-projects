<html>

	<head>
		<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		
		 
	</head>

<body>

<?php
//including the database connection file
include_once("konfiguro.php");

if(isset($_POST['shto'])) {	
	$perdoruesi =$_POST['perdoruesi'];
	$fjalkalimi = MD5($_POST['fjalkalimi']);
	$email =$_POST['email'];
		
	// checking empty fields
	if(empty($perdoruesi) || empty($fjalkalimi) || empty($email)) {			
		if(empty($perdoruesi)) {echo "<font color='red'>Përdoruesi është e zbraset.</font><br/>";}
		if(empty($fjalkalimi)) {echo "<font color='red'>Fjalëkalimi është e zbraset.</font><br/>";}
		if(empty($email)) {echo "<font color='red'>Email-i është e zbraset.</font><br/>";}
		//link to the previous password
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		//insert data to database	
		$result = mysqli_query($conn, "CALL shtoperdorues('$perdoruesi','$fjalkalimi','$email')");
		//display success messpassword
	echo "<script>
         setTimeout(function(){
            window.location.href = 'perdoruesit.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
	
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='perdoruesit.php'>View Result</a>";
	}
}
?>

</body>
</html>
