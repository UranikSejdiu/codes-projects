<head>
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

				<?php
				
include("konfiguro.php");

					
            $result = mysqli_query($conn, "CALL selTeDhenat('kryefaqe')");
            while ($row = mysqli_fetch_assoc($result)) {

              extract($row);
			  
			  
if($result==null)
  mysqli_free_result($result);

            ?>
			<section id="banner">
					<div class="content">
						<header>
					<?php echo $Pershkrimi ?>
				</header>
				</div>
				<a href="#one" class="goto-next scrolly">Next</a>
			</section>
		<?php }  ?>


