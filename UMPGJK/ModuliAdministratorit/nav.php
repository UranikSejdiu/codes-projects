					<nav id="nav">
						<ul>
						<?php
						include("konfiguro.php");
				            $result = mysqli_query($conn, "CALL selectMainMenu_MAdm();");
							/*SELECT m_menu_name, m_menu_link  FROM main_menu WHERE Modul='ModuliAdministratorit'*/
				            while ($row = mysqli_fetch_assoc($result)) {

				              extract($row);
			  
			  
								if($result==null)
								  mysqli_free_result($result);

            							?>
					 			
					 			<li><a href="<?php echo $row['meny_linku']; ?>"><?php echo $row['meny_emri']; ?></a></li>
											<?php } 		?>
						
							</ul>
					
					<li><p style="text-align: right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p></li>
					
					</nav>