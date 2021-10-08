<?php

	include("check.php");
?>
<?php

include_once("config.php");

if(isset($_POST['update']))
{
	$ID_usr = $_POST['ID_usr'];

	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];

	if(empty($username) || empty($password) || empty($email)) {

		if(empty($username)) {
			echo "<font color='red'>username field is empty.</font><br/>";
		}

		if(empty($password)) {
			echo "<font color='red'>password field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
	} else {
		$result = mysqli_query($conn,"UPDATE users SET username='$username',password='$password',email='$email' WHERE ID_usr=$ID_usr");


		header("Location: modifiko_perdorues.php");
	}
}
?>

<?php

	$ID_usr = $_GET['ID_usr'];


	$result = mysqli_query($conn,"SELECT * FROM users WHERE ID_usr=$ID_usr");

	while($res = mysqli_fetch_array($result))
	{
		$username = $res['username'];
		$password = $res['password'];
		$email = $res['email'];
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
								<li class="tm-nav-li"><a href="ballina.php" class="tm-nav-link">Ballina</a></li>
								<li class="tm-nav-li"><a href="perdoruesit.php" class="tm-nav-link active">Përdoruesit</a></li>
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
					<form action="update.php" method="POST" style="margin: auto;" class="tm-contact-form">
				        <div class="form-group ">
				        	Përdoruesi:
				          <input class="form-control" type="text" name="username" value='<?php echo $username;?>'/>
				        </div>

				        <div class="form-group">
				        	Fjalëkalimi:
				          <input class="form-control" type="text" name="password"  value='<?php echo $password;?>'/>
				        </div>

				        <div class="form-group">
				        	Email-i:
				          <input class="form-control" type="text" name="email"  value='<?php echo $email;?>'/>
				        </div>

						<div class="form-group">
				        	<input type="hidden" name="ID_usr" value='<?php echo $_GET['ID_usr'];?>' />
				        </div>

				        <div class="form-group tm-d-flex">
				          <input type="submit" name="update" value="Modifiko" class="tm-btn tm-btn-success tm-btn-right">

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
