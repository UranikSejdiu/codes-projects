<html>

	<head>
		<title>Dërgo rezervimin</title>
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
	$Emri = mysqli_real_escape_string($conn, $_POST['Emri']);
	$Tel = mysqli_real_escape_string($conn, $_POST['Tel']);
	$Data = mysqli_real_escape_string($conn, $_POST['Data']);
	$Cmimi = mysqli_real_escape_string($conn, $_POST['Cmimi']);
	$ID_arma = mysqli_real_escape_string($conn, $_POST['ID_arma']);

	
	
	// checking empty fields
	if(empty($Emri) || empty($Data) || empty($Tel) || empty($Cmimi)) {
				
		if(empty($Emri)) {
			echo "<font color='red'>Emri është e zbraset.</font><br/>";
		}
		
		if(empty($Data)) {
			echo "<font color='red'>Data është e zbraset.</font><br/>";
		}
		
		if(empty($Tel)) {
			echo "<font color='red'>Numri i telefonit është e zbraset.</font><br/>";
		}
		if(empty($Cmimi)) {
			echo "<font color='red'>Çmimi është e zbraset.</font><br/>";
		}
		
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	INSERT INTO umpgjk_rezervimet(emriMbiemri,nrTel,ID_arma,data_rez,Cmimi)VALUES('$Emri','$Tel','$ID_arma','$Data','$Cmimi')
			$newEmri=filter_var($Emri,FILTER_SANITIZE_STRING);
			
		$result = mysqli_query($conn, "CALL shtoRez('$newEmri','$Tel','$ID_arma','$Data','$Cmimi')");
		
		//display success message
			echo "<script>
         setTimeout(function(){
            window.location.href = 'index.php';
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
