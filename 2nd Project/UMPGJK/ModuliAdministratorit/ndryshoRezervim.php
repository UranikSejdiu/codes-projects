<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>

<?php
// including the database connection file
include_once("konfiguro.php");

if(isset($_POST['Ndrysho']))
{	
	$ID_rezervimi = $_POST['ID_rezervimi'];
	$Emri=$_POST['Emri'];
	$Tel=$_POST['Tel'];
	$Data=$_POST['Data'];	
	$Cmimi=$_POST['Cmimi'];
	$ID_arma=$_POST['ID_arma'];
	// checking empty fields
	if(empty($Emri) || empty($Tel) || empty($Data) || empty($Cmimi)) {	
			
		if(empty($Emri)) {
			echo "<font color='red'>Emri është e zbraset.</font><br/>";
		}
		
		if(empty($Tel)) {
			echo "<font color='red'>Numri i Telefonit është e zbraset.</font><br/>";
		}
		
		if(empty($Data)) {
			echo "<font color='red'>Data është e zbraset.</font><br/>";
		}
		if(empty($Cmimi)) {
			echo "<font color='red'>Çmimi është e zbraset.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($conn,"CALL ndryshoRez('$ID_rezervimi','$Emri','$Tel','$ID_arma','$Data','$Cmimi')");
		
		//redirectig to the display message. In our case, it is ballina.php UPDATE studentet SET Emri='$Emri',Mbiemri='$Mbiemri',Datelindja='$Datelindja',Adresa='$Adresa', Pershkrimi='$Pershkrimi', ID_Dep='$ID_Dep', image='$imgData', name='$name' WHERE ID_Stud=$ID_Stud
		header("Location: ndrysho_rezervime.php");
	}
}
?>
<?php
//getting ID_Stud from url
$ID_rezervimi = $_GET['ID_rezervimi'];
//
//selecting data associated with this particular ID_Stud SELECT * FROM umpgjk_rezervimet WHERE ID_rezervimi=$ID_rezervimi
$result = mysqli_query($conn,"CALL selRez('$ID_rezervimi')");
while($res = mysqli_fetch_array($result))
{
	$Emri = $res['emriMbiemri'];
	$Tel = $res['nrTel'];
	$ID_arma = $res['ID_arma'];
	$Data = $res['data_rez'];
	$Cmimi=$res['Cmimi'];	
	
}
?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Landed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="ballina.php">UMPGJK</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="ballina.php">Ballina</a></li>
							<li><a href="rezervimet.php">Rezervimet për gjuajtje</a></li>
							<li><a href="perdoruesit.php">Përdoruesit</a></li>
							<li><a href="ckycu.php" class="button primary">Çkyçu</a></li>
						</ul>
						<li><p style="text-align: right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p></li>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2 style="text-align: center;">UEBAPLIKACIONI PER MENAXHIMIN E POLIGONIT TE GJUAJTJES "KATANA" (UMPGJK)</h2>
						</header>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>
			<!-- Four -->
				<section id="one" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2>Forma për ndryshimin e të dhënave </h2>
							
						</header>
						<div class="box alt">
							<form enctype="multipart/form-data" method="post" action="ndryshoRezervim.php">
								<table class="">
									<tr>
												<select name="ID_arma" required>
													<option selected="selected">Zgjedh Armën</option>
														<?php
														$res=mysqli_query($conn,"CALL selArmetRez()");
														while($row=$res->fetch_array())
														{
															?>
															<option value="<?php echo $row['ID_arma']; ?>"><?php echo $row['Emri']; ?></option>
															<?php
														}
														?>
												</select><br/>
												</tr>
									<tr> 
										<td>Emri dhe Mbiemri:</td>
										<td><input type="text" name="Emri" value="<?php echo $Emri; ?>"></td>
									</tr>
									<tr>
               						 	<td class="t-td" >Nr. i Telefonit:
                    					<br><small>Shembull: 123-456-789</small></td>
                    					<td><input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="Tel" value="<?php echo $Tel; ?>"></td>
       						 		</tr>
									<tr> 
										<td>Data:</td>
										<td ><input style="color: black; font-weight: 700;" type="date" name="Data" value="<?php echo $Data; ?>"></td>
									</tr>
								    <tr> 
										<td>Çmimi:</td>
										<td><select name="Cmimi">
												<option selected="selected">Zgjedh sasinë e plumbave në bazë të çmimit </option>
												<option value="20">15 Plumba - 20€</option>
												<option value="40">30 Plumba - 40€</option>
												<option value="75">60 Plumba - 75€</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><input type="hidden" name="ID_rezervimi" value='<?php echo $_GET['ID_rezervimi'];?>' /></td>
										<td><input type="submit" name="Ndrysho" value="Ndrysho" class="primary" /></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</section>

			
			<!-- Footer -->
				<?php include_once("fundifaqes.php"); ?>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>