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
							<h2>Forma për shtimin e të dhënave të përdoruesit</h2>
							
						</header>
						<div class="box alt">
							<form method="post" action="shtoperdorues.php">
							<table class="">
								<tr>
									<td>Përdoruesi:</td>
									<td><input type="text" name="perdoruesi" id="perdoruesi" value="" /></td>
								</tr>
								<tr>
									<td>Fjalëkalimi:</td>
									<td><input type="text" name="fjalkalimi" id="fjalkalimi" value="" /></td>
								</tr>
								<tr>
									<td>Email-i:</td>
									<td><input type="email" name="email" id="email" value="" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="shto" value="Shto" class="primary" /></td>
								</tr>
							</table>
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