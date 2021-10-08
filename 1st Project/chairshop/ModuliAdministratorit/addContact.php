<html>
<head>
	<title>Shto Kontaktin</title>
</head>
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['addContact'])) {
	$Emri = $_POST['Emri'];
	$Email = $_POST['Email'];
	$NrTel = $_POST['NrTel'];
	$Mesazhi = $_POST['Mesazhi'];



		$result = mysqli_query($conn, "INSERT INTO contact(Emri,Email,NrTel,Mesazhi)
		 VALUES('$Emri','$Email','$NrTel','$Mesazhi')");
		//display success messmessage
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='contact.php'>View Result</a>";
		echo "<script>
         setTimeout(function(){
            window.location.href = 'contact.php';
         }, 5000);
      </script>";
		 echo"<p style='text-align:center;'><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";

	}

?>
</body>
</html>
