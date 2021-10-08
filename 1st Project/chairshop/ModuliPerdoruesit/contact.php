<?php
	include("config.php");	
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Moduli i Përdoruesit</title>
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
								<h6 class="tm-site-description">Të gjitha llojet e karrigave në një vendë.</h6>	
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Ballina</a></li>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link active">Kontakti</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Forma për kontaktim</h2>
				<p class="col-12 text-center">Për çdo problem, ju lutem na kontaktoni përmes formës me poshtë.</p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="addContact.php" method="POST" class="tm-contact-form">
					        <div class="form-group">
					          <input type="text" name="Emri" id="Emri" class="form-control" placeholder="Emër, Mbiemër" required="" />
					        </div>
					        
					        <div class="form-group">
					          <input type="email" id="Email" name="Email" class="form-control" placeholder="Email-i" required="" />
					        </div>
					        <div class="form-group">
					          <input type="text" id="NrTel" name="NrTel" class="form-control" placeholder="Numri Telefonit" required="" />
					        </div>
				
					        <div class="form-group">
					          <textarea rows="5" id="Mesazhi" name="Mesazhi" class="form-control" placeholder="Mesazhi juaj" required=""></textarea>
					        </div>
					
					        <div class="form-group tm-d-flex">
					          <input class="tm-btn tm-btn-success tm-btn-right" type="submit" name="addContact" value="Dërgo">
					        </div>
						</form>
					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Adresa jonë</h4>
							<address>
								Kosovë,
								Ferizaj,
								70000
							</address>
							<a href="tel:080-090-0110" class="tm-contact-link">
								<i class="fas fa-phone tm-contact-icon"></i>045/434-177
							</a>
							<a href="mailto:info@company.co" class="tm-contact-link">
								<i class="fas fa-envelope tm-contact-icon"></i>chairshop@company.com
							</a>
							<div class="tm-contact-social">
								<a href="#" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
            

			<div class="tm-container-inner-2 tm-map-section">
				<div class="row">
					<div class="col-12">
						<div class="tm-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2946.2138084309213!2d21.157090114850647!3d42.401891940452494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13547e2733ddf29d%3A0x2082e4366fbb573c!2sM2%2C%20Muhoc!5e0!3m2!1sen!2s!4v1577050949122!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						</div>
					</div>
				</div>
			</div>
			<
		</main>

<?php include_once('footer.php'); ?>
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