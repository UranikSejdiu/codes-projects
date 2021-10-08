
			<nav id="nav">
				
						<?php
						
				            $result = mysqli_query($conn, "CALL selectMainMenu_Mprd()");
							/*SELECT m_menu_name, m_menu_link  FROM main_menu WHERE Modul='ModuliAdministratorit'*/
				            while ($row = mysqli_fetch_assoc($result)) {

				              extract($row);
			  
			  
								if($result==null)
								  mysqli_free_result($result);

            							?>
            							<ul>
					 			<li><a href="<?php echo $row['meny_linku']; ?>"><?php echo $row['meny_emri']; ?></a></li> 
					 			</ul>
											<?php } 		?>
						
					
					
						
					
					</nav>