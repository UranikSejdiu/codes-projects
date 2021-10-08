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
			<header class="row tm-welcome-section">

			</header>
				<div class="tm-container-inner tm-features">
					<div class="row">
						<h3 style="margin: 15px auto;">Jepni të dhënat e produktit</h3>
							<div style="margin:auto;" class="table">
								<form style="margin:auto;" enctype="multipart/form-data"  action="addProdukte.php" method="post" name="form1">
									<table style="margin: auto;">
										<tr>
										<select style="width: 35%; margin: auto;" class="form-control" name="ID_llojet">
											<option  selected="selected">Zgjedh llojin e produktit</option>
												<?php
												$res=mysqli_query($conn,"SELECT * FROM llojet_chsh");
												while($row=$res->fetch_array())
												{
													?>
													<option  value="<?php echo $row['ID_llojet']; ?>"><?php echo $row['Lloji']; ?></option>
													<?php
												}
												?>
										</select><br />
										</tr>


										<tr>
											<td>Emri:</td>
											<td><input class="form-control" type="text" name="Emri"></td>
										</tr>
										<tr>
											<td>Çmimi:</td>
											<td><input class="form-control" type="text" name="Çmimi"></td>
										</tr>
										<tr>

											<td>Imazhi:<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
											<td><input class="form-control" name="userfile" type="file" /></td>
										</tr>
									    <tr>
										<td>Pershkrimi:</td>
											<td><textarea maxlength="1000" class="form-control" type="text" name="Pershkrimi" placeholder="Përshkrimi i produktit" rows="8" cols="50"></textarea></td>
										</tr>


										<tr>
											<td></td>
											<td style="text-align: center;"><input class="tm-btn tm-btn-success tm-btn-right" type="submit" name="addProdukte" value="Shto"></td>
										</tr>

									</table>
							</form>
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
