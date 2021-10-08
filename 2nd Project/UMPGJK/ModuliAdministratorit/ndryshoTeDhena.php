<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>
<?php
// including the database connection file
include_once("konfiguro.php");

if(isset($_POST['Ndrysho']))
{	
	$ID_tedhena = $_POST['ID_tedhena'];
	
	$Titulli=$_POST['Titulli'];
	$Pershkrimi=$_POST['Pershkrimi'];
	$Lokacioni=$_POST['Lokacioni'];	
	$Vendi=$_POST['Vendi'];
	// checking empty fields
	if(empty($Titulli) || empty($Pershkrimi) || empty($Vendi)) {	
			
		if(empty($Titulli)) {
			echo "<font color='red'>Titulli është e zbraset.</font><br/>";
		}
		if(empty($Pershkrimi)) {
			echo "<font color='red'>Pershkrimi është e zbraset.</font><br/>";
		}
		if(empty($Vendi)) {
			echo "<font color='red'>Vendi është e zbraset.</font><br/>";
		}		
	} else {
		
		//updating the table
		$result = mysqli_query($conn,"CALL ndryshoTeDhena('$ID_tedhena','$Titulli','$Pershkrimi','$Lokacioni','$Vendi')");
		//redirectig to the display ppassword. In our case, it is admin.php
		header("Location: ndrysho_tedhena.php");
	}
}
?>
<?php
//getting ID_Dep from url
$ID_tedhena = $_GET['ID_tedhena'];
//
//selecting data associated with this particular ID_Dep
$result = mysqli_query($conn,"CALL selTeDhenaInOut('$ID_tedhena')");

while($res = mysqli_fetch_array($result))
{
	$Titulli = $res['Titulli'];
	$Pershkrimi = $res['Pershkrimi'];
	$Lokacioni = $res['Lokacioni'];
	$Vendi = $res['Vendi'];
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
							<form  method="post" action="ndryshoTeDhena.php">
								<table class="">
									<tr>
										<td>Titulli:</td>
										<td><input type="text" name="Titulli"  value="<?php echo $Titulli;?>" /></td>
									</tr>
									<tr>
										<td>Pershkrimi:</td>
										<td><textarea style="resize: none;" name="Pershkrimi" type="text" ><?php echo $Pershkrimi;?></textarea></td>
									</tr>
									<tr>
										<td>Lokacioni i file-it:</td>
										<td><input type="text" name="Lokacioni" value="<?php echo $Lokacioni;?>" /></td>
									</tr>
									<tr>
										<td>Vendi:</td>
										<td><input type="text" name="Vendi" value="<?php echo $Vendi;?>" /></td>
									</tr>
									<tr>
										<td><input type="hidden" name="ID_tedhena" value='<?php echo $_GET['ID_tedhena'];?>' /></td>
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