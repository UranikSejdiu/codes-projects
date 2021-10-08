<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>

<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Moduli Administratorit - UMPGJP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload landing">
		<div id="page-wrapper">

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
							<h2>Forma për shtimin e rezervimeve të reja</h2>
							
						</header>
						<div class="box alt">
							<form enctype="multipart/form-data"  action="shtoRezervime.php" method="post" name="form1">
											<table>
												
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
													<td><input type="text" name="Emri"></td>
												</tr>
												<tr>
                               						 <td class="t-td" >Nr. i Telefonit:
                                					<br><small>Shembull: 123-456-789</small></td>
                                					<td><input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="Tel"></td>
                           						 </tr>
												<tr> 
													<td>Data:</td>
													<td ><input style="color: black; font-weight: 700;" type="date" name="Data"></td>
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
													<td></td>
													<td><input type="submit" name="shto" value="Shto"></td>
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