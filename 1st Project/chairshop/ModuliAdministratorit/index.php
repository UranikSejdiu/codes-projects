<?php
	include('login.php');
	if ((isset($_SESSION['username'])) !='') {
		header('Location:admin_home.php');
	}
?>





<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Simple House - Contact Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
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
						
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<div class="tm-address-box">
							<h2 class="col-12 text-center tm-section-title">Informata</h2>
				<p class="col-12 text-center">Për t'u kyçur në webaplikacion duhet të kontaktoni administratorin për krijimin e llogarisë.</p>
							
						</div>
					</div>

					<div class="col-md-6">
						<form action="" method="POST" class="tm-contact-form">
					        <div class="form-group">
					          <input type="text" name="username" id="username" class="form-control" placeholder="Përdoruesi" required="" />
					        </div>
					        
					        <div class="form-group">
					          <input type="password" name="password" id="password" class="form-control" placeholder="Fjalëkalimi" required="" />
					        </div>
					
					        <div class="form-group tm-d-flex">
					          <input class="tm-btn tm-btn-success tm-btn-right" type="submit" name="submit" value="Kyçu" >
					          
					        </div>
						</form>
					</div>
					
				</div>
			</div>
		</main>
		<br>
		<br>
	<?php include_once('footer.php');?>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function(){
			var acc = document.getElementsByClassName("accordion");
			var i;
			
			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight) {
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    }
			  });
			}	
		});
	</script>
</body>
</html>