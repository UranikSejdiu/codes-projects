<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>

<?php
// including the database connection file
include_once("konfiguro.php");

if(isset($_POST['ndrysho']))
{	
	$meny_id = $_POST['meny_id'];
	
	$menu_name=$_POST['menu_name'];
	$menu_link=$_POST['menu_link'];
	$Modul=$_POST['Modul'];	
	
	// checking empty fields
	if(empty($menu_name) || empty($menu_link) || empty($Modul)) {	
			
		if(empty($menu_name)) {
			echo "<font color='red'>Emri i meny-së është e zbraset.</font><br/>";
		}
		
		if(empty($menu_link)) {
			echo "<font color='red'>Linku u meny-së është e zbraset.</font><br/>";
		}
		
		if(empty($Modul)) {
			echo "<font color='red'>Moduli është e zbraset.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($conn,"UPDATE umpgjk_meny SET meny_emri='$menu_name',meny_linku='$menu_link',modul='$Modul' WHERE meny_id=$m_menu_id");
		
		//redirectig to the display pm_menu_link. In our case, it is admin.php
		header("Location: ndrysho_meny.php");
	}
}

?>
<?php
//getting uid from url
$meny_id = $_GET['meny_id'];

//selecting data associated with this particular uid
$result = mysqli_query($conn,"SELECT * FROM umpgjk_meny WHERE meny_id=$meny_id");

while($res = mysqli_fetch_array($result))
{
	$menu_name = $res['meny_emri'];
	$menu_link = $res['meny_linku'];
	$Modul = $res['modul'];
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
							<form m_menu_name="form1" method="post" action="ndryshoMeny.php">
	
								<h3>Modifiko të dhënat e Meny-së</h3>
								<table>
									<tr>
										<td>Emri meny-së</td>
										<td><input type="text" name="menu_name" value='<?php echo $menu_name;?>' /></td>
									</tr>
									<tr>
										<td>Linku i meny-së:</td>
										<td><input type="text" name="menu_link" value='<?php echo $menu_link;?>' /></td>
									</tr>
									<tr>
										<td>Modul-i</td>
										<td><input type="text" name="Modul" value='<?php echo $Modul;?>' /></td>
									</tr>
									<tr>
										<td><input type="hidden" name="meny_id" value='<?php echo $_GET['meny_id'];?>' /></td>
										<td><input type="submit" name="ndrysho" value="Ndrysho"></td>
									<tr>
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