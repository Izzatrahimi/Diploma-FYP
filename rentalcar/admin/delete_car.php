<?php
	include('../connection/dbconn.php');
	
	$car_id=$_GET['car_id'];
	
	$delete = "DELETE FROM car WHERE car_id='$car_id'";
	$result = mysqli_query($dbconn, $delete) or die ("Error: " . mysqli_error($dbconn));
	//echo $delete;
	
	if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "view_car.php"
	  </script>
	  <?php }
    
    else
    {
      echo $update;
	?> 
	  <script type="text/javascript">
	  	window.location = "view_car.php"
	  </script>
	<?php       
     } 
	
?>