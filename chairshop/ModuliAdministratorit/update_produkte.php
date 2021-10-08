<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>

<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update_produkte']))
{	
	$ID_prod = $_POST['ID_prod'];
	$Emri=$_POST['Emri'];
	$Çmimi=$_POST['Çmimi'];
	$Pershkrimi=$_POST['Pershkrimi'];		
	$ID_llojet=$_POST['ID_llojet'];	
	
	$imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$name = $_FILES['userfile']['name'];
	$maxsize = 10000000; //set to approx 10 MB
	
	// checking empty fields
	if(empty($Emri) || empty($Çmimi)) {	
			
		if(empty($Emri)) {
			echo "<font color='red'>Emri field is empty.</font><br/>";
		}
		
		if(empty($Çmimi)) {
			echo "<font color='red'>Çmimi field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($conn,"UPDATE produktet_chsh SET Emri='$Emri',Çmimi='$Çmimi',Pershkrimi='$Pershkrimi', ID_llojet='$ID_llojet', Fotoja='$imgData' WHERE ID_prod=$ID_prod");
		
		//redirectig to the display message. In our case, it is ballina.php
		header("Location: modifiko_produkte.php");
	}
}
?>
<?php
//getting ID_Stud from url
$ID_prod = $_GET['ID_prod'];

//selecting data associated with this particular ID_Stud
$result = mysqli_query($conn,"SELECT * FROM produktet_chsh WHERE ID_prod=$ID_prod");

while($res = mysqli_fetch_array($result))
{
	$Emri = $res['Emri'];
	$Çmimi = $res['Çmimi'];
	$Pershkrimi=$res['Pershkrimi'];	
	$ID_llojet = $res['ID_llojet'];
}
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
						<h3 style="text-align: center; margin: 10px auto;">Modifiko të dhënat e produktit</h3>
							<div style="margin:auto; border:none;" class="table" >
								<form  enctype="multipart/form-data"  action="update_produkte.php" method="post" name="form1">
									<table style="margin:auto;">
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
											<td><input class="form-control" type="text" name="Emri" value='<?php echo $Emri;?>' required></td>
										</tr>
										<tr>
											<td>Çmimi:</td>
											<td><input class="form-control" type="text" name="Çmimi" value='<?php echo $Çmimi;?>' required></td>
										</tr>
									    <tr>
										<td>Pershkrimi:</td>
											<td><textarea  class="form-control" name="Pershkrimi" rows="8" cols="50"><?php echo $Pershkrimi;?></textarea></td>
										</tr>
										<tr>

											<td>Imazhi:<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
											<td><input class="form-control" name="userfile" type="file" /></td>
										</tr>


										<tr>
											<td><input type="hidden" name="ID_prod" value='<?php echo $_GET['ID_prod'];?>'/></td>
											<td style="text-align: center;"><input class="tm-btn tm-btn-success tm-btn-right" type="submit" name="update_produkte" value="Modifiko"></td>
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
