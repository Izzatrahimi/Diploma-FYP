<?php
	include('../connection/dbconn.php');
	
	$id=$_GET['id'];
	
	$delete = "DELETE FROM user WHERE id='$id'";
	$result = mysqli_query($dbconn, $delete) or die ("Error: " . mysqli_error($dbconn));
	//echo $delete;
	
	if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "view_user.php"
	  </script>
	  <?php }
    
    else
    {
      echo $update;
	?> 
	  <script type="text/javascript">
	  	window.location = "view_user.php"
	  </script>
	<?php       
     } 
	
?>