<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");
	include_once("konfiguro.php");	
?>


<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>UMPGJK</title>
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
							<h2>Forma për menaxhimin e rezervimeve </h2>
							
						</header>
						<div class="box alt">
							<form action="" method="post">
								
								<table >
									<tr>
										<h3>Kërko të dhënat  për fshirje</h3>
									</tr>
									<tr>
										<td>
											Shkruaj:
										</td>
										<td>
											<input type="text" name="term" placeholder="Emrin ose Mbiemrin"/>
										</td>
										<td> <input type="submit" value="Kërko" /></td>
									</tr>
								</table>
								
							</form> 
						</div>
						<div id="table-res">
						<table >
							<tr>
								<td>Emri dhe Mbiemri</td>
								<td>Nr. Telefonit</td>
								<td>Lloji armës</td>
								<td>Data</td>
								<td>Çmimi</td>
								<td>Fshi</td>
							</tr>
							<?php
								if (!empty($_REQUEST['term'])) {

								$term = mysqli_real_escape_string($conn,$_REQUEST['term']);     

								$sql = mysqli_query($conn,"CALL selRezervim('$term')"); 

								while($row = mysqli_fetch_array($sql)) { 		
										echo "<tr>";
										echo "<td>".$row['emriMbiemri']."</td>";
										echo "<td>".$row['nrTel']."</td>";
										echo "<td>".$row['Emri']."</td>";
										echo "<td>".$row['data_rez']."</td>";	
										echo "<td>".$row['Cmimi'].'€'."</td>";
										
										echo "<td><a href=\"fshiRezervim.php?ID_rezervimi=$row[ID_rezervimi]\" onClick=\"return confirm('A jeni te sigurt se deshironi te fshini?')\" class='button' class='button primary'>Fshi</a> </td>";			
									}

								}

								?>
						</table>
							</div> 
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