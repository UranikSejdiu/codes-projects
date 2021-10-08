<?php

	include("check.php");
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Moduli i Administratorit</title>
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
								<li class="tm-nav-li"><a href="ballina.php" class="tm-nav-link">Ballina</a></li>
								<li class="tm-nav-li"><a href="perdoruesit.php" class="tm-nav-link">Përdoruesit</a></li>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link active">Kontakti</a></li>
								<li class="tm-nav-li"><a href="logout.php" class="tm-nav-link">Çkyçu</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
			<p style="text-align: right; padding:30px;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>

				<h3 style="text-align: center; padding: 1rem;">Menaxhimi i të dhënave të kontaktit</h3>
			<div style="border:solid #e6e6e6 1px;" class="tm-container-inner tm-features">
				<div class="row">
					<div class="col-lg-4">
						<div class="tm-feature">
							<i style="color: #2D99CC;"class="fas fa-4x far fa-plus tm-feature-icon "></i>
							<p class="tm-feature-description">Forma për shtimin e kontakteve të reja.</p>
							<br>
							<a href="shto_contact.php" class="tm-btn tm-btn-primary">Shto Kontakte</a>

						</div>
					</div>
					<div class="col-lg-4">
						<div class="tm-feature">
							<i style="color: #319966;" class="fas fa-4x far fa-pen tm-feature-icon"></i>
							<p class="tm-feature-description">Forma për modifikimin e kontakteve aktuale.</p>
							<a href="modifiko_contact.php" class="tm-btn tm-btn-success">Modifiko Kontaktet</a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="tm-feature">
							<i style="color:#993332;" class="fas fa-4x far fa-eraser tm-feature-icon"></i>
							<p class="tm-feature-description">Forma për fshirjen e kontakteve aktuale.</p>
							<a href="fshij_contact.php" class="tm-btn tm-btn-danger">Fshijë Kontakte</a>
						</div>
					</div>
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
