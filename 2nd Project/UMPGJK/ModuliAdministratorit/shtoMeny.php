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
	$menu_name = $_POST['menu_name'];
	$menu_link = $_POST['menu_link'];
	$modul = $_POST['Modul'];
		
	// checking empty fields
	if(empty($menu_name) || empty($menu_link) || empty($modul)) {			
		if(empty($m_menu_name)) {echo "<font color='red'>Emri i Meny-së është e zbraset.</font><br/>";}
		if(empty($m_menu_link)) {echo "<font color='red'>Linku i meny-së është e zbraset.</font><br/>";}
		if(empty($Modul)) {echo "<font color='red'>Modul është e zbraset.</font><br/>";}
		//link to the previous m_menu_link
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		//insert data to database	
		$result = mysqli_query($conn, "CALL shtoMeny('$menu_name','$menu_link','$modul')");
		//display success messm_menu_link
	echo "<script>
         setTimeout(function(){
            window.location.href = 'ballina.php';
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
