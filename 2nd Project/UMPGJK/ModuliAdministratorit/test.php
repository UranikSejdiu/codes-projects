<?php include("kontrollo.php");	 ?>

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
							<li><a href="perdoruesit.php">Përdoruesit</a></li>
							<li><a href="ckycu.php" class="button primary">Çkyçu</a></li>
						</ul>
						<ul>
							<li></li>
							<li></li>
							<li><p>Përshëndetje, <em><?php  echo $login_user;?>!</em></p></li>
						</ul>
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
				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2>Forma per menaxhimin e te dhenave</h2>
							
						</header>
						<div class="box alt">
							<section class="col-4 col-6-medium col-12-xsmall">
							<input type="text" id="val1" class="col-4 col-6-medium col-12-xsmall"><input type="text" id="val2" readonly value="3">
							
							<input type="text" class="col-4 col-6-medium col-12-xsmall" id="res">
							<input type="button" class="col-4 col-6-medium col-12-xsmall" value="Totali" onclick="calculate();">
							</section>
						</div>
					</div>
				</section>
							
			<!-- Footer -->
				
					<?php include_once("fundifaqes.php"); ?>
					<script >
					function calculate(){

					var val1 = document.getElementById('val1').value;
					var val2 = document.getElementById('val2').value;
					var res = (parseFloat(val1)*parseFloat(val2))

					document.getElementById('res').value=res;

						}


					</script>
				

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