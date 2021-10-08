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

include_once("config.php");

if(isset($_POST['add'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];


	if(empty($username) || empty($password) || empty($email)) {
		if(empty($username)) {echo "<font color='red'>username field is empty.</font><br/>";}
		if(empty($password)) {echo "<font color='red'>password field is empty.</font><br/>";}
		if(empty($email)) {echo "<font color='red'>Email field is empty.</font><br/>";}

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {

		$result = mysqli_query($conn, "INSERT INTO users(username,password,email) VALUES('$username','$password','$email')");

	echo "<script>
         setTimeout(function(){
            window.location.href = 'perdoruesit.php';
         }, 5000);
      </script>";
		 echo"<p style='text-align:center;'><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";


	}
}
?>

</body>
</html>
