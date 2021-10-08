<html>
<head>
	<title>Shto Lloje</title>
</head>
<body>
<?php

include_once("config.php");

if(isset($_POST['addLloje'])) {
	$lloji = $_POST['lloji'];

	// checking empty fields
	if(empty($lloji)) {
		if(empty($lloji)) {echo "<font color='red'>Lloji field is empty.</font><br/>";}


		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {

		$result = mysqli_query($conn, "INSERT INTO llojet_chsh(Lloji) VALUES('$lloji')");

		echo "<script>
         setTimeout(function(){
            window.location.href = 'ballina.php';
         }, 5000);
      </script>";
		 echo"<p style='text-align:center;'><b>   E dhëna është duke u regjistruar në sistem. Ju lutem pritni 5 sekonda. <b></p>";

	}
}
?>
</body>
</html>
