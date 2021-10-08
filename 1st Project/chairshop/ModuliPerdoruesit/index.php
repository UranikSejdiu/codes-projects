<?php include_once("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Moduli i Përdoruesit</title>
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
								<h6 class="tm-site-description">Të gjitha llojet e karrigave në një vendë.</h6>	
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link active">Ballina</a></li>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Kontakti</a></li>
								
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Chair Shop</h2>
				<p class="col-12 text-center">Mirë se vini në webfaqe tonë, këtu ne ofrojmë të gjitha llojet nga më të ndryshme të karrigave më çmime të volitshme.</p>
			</header>
			
				<div class="row tm-gallery">
				<!-- gallery page 1 -->
				<div id="tm-gallery-page-pizza" class="tm-gallery-page">
					<?php
            $result = mysqli_query($conn, "SELECT  d.Lloji, s.Emri, s.Çmimi, s.Fotoja, s.Pershkrimi FROM produktet_chsh s
LEFT OUTER JOIN llojet_chsh d ON s.ID_prod = d.ID_llojet
GROUP BY d.Lloji, s.Emri, s.Çmimi, s.Fotoja, s.Pershkrimi
ORDER BY d.ID_llojet, s.ID_prod DESC");
            while ($row = mysqli_fetch_assoc($result)) {

              extract($row);
			  
			  
if($result==null)
  mysqli_free_result($result);

            ?>
					<article style="border: 1px solid #d3d3d3;" class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">

						<figure>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Fotoja'] ).'" width="100%" height="100%">'; ?>
							<figcaption>
								<div style="margin-top: 10%;">
								<h4 style="text-align: center; height: 50px;" class="tm-gallery-title"><?php echo "$Emri"; ?></h4>
								<p style="text-align: center; height: 15px;" class="tm-gallery-price"><?php echo "$Çmimi"."€"; ?></p>
								</div>
							</figcaption>
						</figure>

					</article>
				<?php } ?>
				</div>
			</div>


















		</main>

		<?php include_once('footer.php'); ?>
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