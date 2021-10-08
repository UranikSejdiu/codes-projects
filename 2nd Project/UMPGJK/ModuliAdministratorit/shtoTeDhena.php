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

if(isset($_POST['Shto'])) {	
	$Titulli = $_POST['titulli'];
	$Pershkrimi = $_POST['pershkrimi'];
	$Lokacioni = $_POST['lokacioni'];
	$Vendi = $_POST['vendi'];
	

	
	
	// checking empty fields
	if(empty($Titulli) || empty($Pershkrimi)|| empty($Vendi)) {
				
		if(empty($Titulli)) {
			echo "<font color='red'>Titulli është e zbraset.</font><br/>";
		}
		
		if(empty($Pershkrimi)) {
			echo "<font color='red'>Pershkrimi është e zbraset.</font><br/>";
		}
		if(empty($Vendi)) {
			echo "<font color='red'>Vendi është e zbraset.</font><br/>";
		}
		
		//link to the previous pMbiTitulli
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($conn, "CALL shtoTeDhena('$Titulli','$Pershkrimi','$Lokacioni','$Vendi')");
				//display success message
			echo "<script>
         setTimeout(function(){
            window.location.href = 'ballina.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
		 
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='ballina.php'>View Result</a>";
	}
}
?>

</body>
</html>
