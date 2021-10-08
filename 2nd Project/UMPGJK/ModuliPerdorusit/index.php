
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
		<style type="text/css">
			#banner{
				background-image: url(images/img3.jpg);
			}
		</style>
	</head>
	<body class="is-preload landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php">UMPGJK</a></h1>
					<header id="header">
					<h1 id="logo"><a href="index.php">UMPGJK</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Ballina</a></li>
							<li><a href="dergo_rezervime.php">Rezervo orarin për gjuajtje</a></li>
						</ul>
						<?php
						$visits = 1;
					if (isset($_COOKIE["visits"])) {
					    $visits = (int)$_COOKIE["visits"];
					}    $Month = 2592000 + time();
					    //this adds 30 days to the current time
					 setcookie("visits", date("F jS - g:i a"), $Month);
						if(isset($_COOKIE['visits']))
					    {
					    $last = $_COOKIE['visits'];
					    echo "<p style='text-align:right;'>Vizita juaj e fundit ishte me: " . $last."</p>";
					    }
					    else
					    {   echo "<p style='text-align:right;'>Vizita juaj e pare ne webaplikacion tone! Mirë se vini!</p>";    }
 				?>
					</nav>
				</header>
					
				


			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>Mirë se vini</h2>
							<p >Këtu mundë të gjeni gjitha informatat rreth <br> poligonit të gjuajtjes "Katana".</p>
						</header>
						<span class="image"><img src="images/img1.jfif" alt="" /></span>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>
				

			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="images/img2.jpg" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="col-4 col-12-medium">
									<header>
										<h2>Poligonet për gjuajtje</h2>
										<p>Numër të madhë të shiritave për gjuajtje</p>
									</header>
								</div>
								<div class="col-4 col-12-medium">
									<p>Me një hapsirë shumë të gjerë nëntoksore dhe mundësi të mëdha të zgjedhjeve, me mundësi të rezervimit të orarit për gjuajtje gjithashtu edhe pa rezervim dyert tona janë të hapura gjithmon dhe në çdo kohë.</p>
								</div>
								<div class="col-4 col-12-medium">
									<p>Me një staf të trajnuar dhe specialist në hapsirën punuese siguria është dhe dotë jetë gjithmon në nivel shumë të lartë dhe të avancuar.</p>
								</div>
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
				<section id="two" class="spotlight style2 right">
					<span class="image fit main"><img src="images/img4.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Lokacioni ynë</h2>
						</header>
						<p>Ne gjendemi në qytetin e Ferizajt, në periferi të qytetit në një vend ku nuk mund të pengohen të tjerët nga veprimet dhe aksinet tona.</p>
						<ul class="actions">
							<li><a href="https://goo.gl/maps/6nYtJJUQXQ3gWvRs7" target="_blank" class="button">Na gjeni këtu</a></li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</section>


			<?php include_once("fundifaqes.php") ?>
				

			
				

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