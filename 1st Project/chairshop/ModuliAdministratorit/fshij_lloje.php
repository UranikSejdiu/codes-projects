<?php

	include("check.php");
?>
<?php
	include_once("config.php");

	$result = mysqli_query($conn,
	"SELECT * FROM llojet_chsh ORDER BY ID_llojet DESC");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Chair Shop</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
	<link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
</head>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->
<body>

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/banner.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/final1.png" alt="Logo" class="tm-site-logo" />
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Chair Shop</h1>
								<h6 class="tm-site-description">Të gjitha llojet e karrigave në një vendë</h6>
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="ballina.php" class="tm-nav-link active">Ballina</a></li>
								<li class="tm-nav-li"><a href="perdoruesit.php" class="tm-nav-link">Përdoruesit</a></li>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Kontakti</a></li>
								<li class="tm-nav-li"><a href="logout.php" class="tm-nav-link">Çkyçu</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
			<p style="text-align: right; padding:30px;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>



			<div class="tm-container-inner tm-features">
				<div class="row">

						<form style="margin: auto;" action="" method="post">
							<table>
								<tr>
									<h3>Kërko të dhënat e përdoruesit që dëshironi të fshini</h3>
								</tr>
							<tr>
								<td>
								<h3 style="font-weight:100;"> Shkruaj:</h3>
								</td>
								<td>
									<input class="form-control" type="text" name="term" placeholder="Lloji"/>
								</td>
								<td> <input class="tm-btn tm-btn-success tm-btn-right" type="submit" value="Kërko" /></td>
							</tr>
						</table>
						</form>

						<div class="table">
							<table width="100%;" style="text-align: center;">
								<tr>
									<td style="padding: 5px;">Lloji</td>
									<td style="padding: 5px;">Fshijë</td>
								</tr>
									<?php
										if (!empty($_REQUEST['term'])) {
											$term = mysqli_real_escape_string
											($conn,$_REQUEST['term']);
											$sql = mysqli_query($conn,
											"SELECT * FROM llojet_chsh
											WHERE Lloji LIKE '%".$term."%'");
											while($row = mysqli_fetch_array($sql)) {
													echo "<tr>";
													echo "<td>".$row['Lloji']."</td>";
													echo "<td><a href=\"delete_lloje.php?ID_llojet=$row[ID_llojet]\" onClick=\"return confirm('A jeni te sigurt se deshironi te fshini llojin?')\"class='tm-btn tm-btn-danger'>Fshijë</a></td></tr>";
												}
										}

									?>
						</div>
					</table>


				</div>
			</div>

		</main>
		<br>
		<br>
		<br>
		<br>
		<?php include_once('footer.php');?>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function(){
			// Handle click on paging links
			$('.tm-paging-link').click(function(e){
				e.preventDefault();

				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});
	</script>
</body>
</html>
