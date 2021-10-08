<footer class="tm-footer text-center">
	<?php
$result=mysqli_query($conn, "SELECT * FROM elementet WHERE Lokacioni ='Footer'");
while ($row=mysqli_fetch_assoc($result)) {
    extract($row);
    if ($result==null)
    mysqli_free_result ($result);
    ?> 

   
  <?php echo $Pershkrimi; ?> 
<?php } ?>
</footer>