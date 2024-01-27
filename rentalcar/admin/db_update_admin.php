<?php
include('../connection/dbconn.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}
	  $update = "UPDATE user SET
				name='$valuearr[0]',
				
				email='$valuearr[1]',
				phone='$valuearr[2]',
				address='$valuearr[3]',
				password='$valuearr[5]'
		
				WHERE username='$valuearr[4]'";
	  //echo $update;
	  $result = mysqli_query($dbconn, $update) or die ("Error: " . mysqli_error($dbconn));

	  if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "update_view_user.php"
	  </script>
	  <?php }       
     
?>