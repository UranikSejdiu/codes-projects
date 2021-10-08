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

include_once("konfiguro.php");
$msg = ""; 

if(isset($_POST['shto'])) {	
	$Emri = $_POST['Emri'];
	//$Emblema = addslashes(file_get_contents($_FILES['Emblema']['tmp_name']));; 
  	$imgData =addslashes (file_get_contents($_FILES['foto']['tmp_name']));
	$Foto = $_FILES['foto']['name'];
	
	 $maxsize = 10000000; //set to approx 10 MB

	//$image =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	//$name = $_FILES['userfile']['name']
	//$name = $_FILES['image']['name'];
	
	// $maxsize = 10000000; //set to approx 10 MB
	
    // checking empty fields
	if(empty($Emri) || empty($Foto)) {			
		if(empty($Emri)) {echo "<font color='red'>Emri i armës është i zbrazët.</font><br/>";}
		if(empty($Foto)) {echo "<font color='red'>Fotoja është e zbrazët.</font><br/>";}
		 "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
	$result = mysqli_query($conn, "CALL shtoArme('$Emri','$imgData', '$Foto')");
		echo "<script>
         setTimeout(function(){
            window.location.href = 'ballina.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
		  
     
	
	}
	
}
?>
</body>
</html>

