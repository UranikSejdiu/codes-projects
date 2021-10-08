<?php include("konfiguro.php"); ?>
				<footer id="footer">

					
						<?php
									
						            $result = mysqli_query($conn,"CALL selTeDhenat('Fundifaqes_Details')");
						            while ($row = mysqli_fetch_assoc($result)) {

						              extract($row);
									  
									  
						if($result==null)
						  mysqli_free_result($result);

						            ?>
												<ul class="icons">
													<?php echo $Pershkrimi; ?>
												</ul>
									<?php } ?>
									
							
					</footer>