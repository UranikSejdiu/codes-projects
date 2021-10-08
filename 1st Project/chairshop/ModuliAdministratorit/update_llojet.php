<?php

	include("check.php");
?>
<?php

include_once("config.php");

if(isset($_POST['update_llojet']))
{
	$ID_llojet = $_POST['ID_llojet'];

	$Lloji=$_POST['Lloji'];

	if(empty($Lloji)) {

		if(empty($Lloji)) {
			echo "<font color='red'>username field is empty.</font><br/>";
		}
	} else {
		$result = mysqli_query($conn,"UPDATE llojet_chsh SET Lloji='$Lloji' WHERE ID_llojet=$ID_llojet");


		header("Location: modifiko_llojet.php");
	}
}
?>

<?php

	$ID_llojet = $_GET['ID_llojet'];


	$result = mysqli_query($conn,"SELECT * FROM llojet_chsh WHERE ID_llojet=$ID_llojet");

	while($res = mysqli_fetch_array($result))
	{
		$Lloji = $res['Lloji'];
	}
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
			<header class="row tm-welcome-section">

			</header>


			<div class="tm-container-inner tm-features">
				<div class="row">
					<form action="update_llojet.php" method="POST" style="margin: auto;" class="tm-contact-form">
				        <div class="form-group ">
				        	Lloji:
				          <input class="form-control" type="text" name="Lloji" value='<?php echo $Lloji;?>'/>
				        </div>

						<div class="form-group">
				        	<input type="hidden" name="ID_llojet" value='<?php echo $_GET['ID_llojet'];?>' />
				        </div>

				        <div class="form-group tm-d-flex">
				          <input type="submit" name="update_llojet" value="Modifiko" class="tm-btn tm-btn-success tm-btn-right">

				        </div>
					</form>
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
