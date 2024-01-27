<?php
	include('../connection/dbconn.php');
	
	$id=$_POST['id'];
	
	$update = "UPDATE book SET status='complete' WHERE book_id='$id'";
	$result = mysqli_query($dbconn, $update) or die ("Error: " . mysqli_error($dbconn));
	if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "view_book.php"
	  </script>
	  <?php }
    
    else
    {
      echo $update;
	?> 
	  <script type="text/javascript">
	  	window.location = "view_book.php"
	  </script>
	<?php       
     } 
?>