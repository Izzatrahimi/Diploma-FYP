<?php
include('../connection/dbconn.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}

	  $update = "UPDATE car SET
				car_image='$valuearr[0]',
				car_status='$valuearr[1]',
				car_year='$valuearr[2]',
				car_name='$valuearr[3]',
				car_price='$valuearr[4]'
				
				WHERE car_id='$valuearr[6]'";
	  //echo $update;
	  $result = mysqli_query($dbconn, $update) or die ("Error: " . mysqli_error($dbconn));

	  if ($result) {
	  ?>
	  <script type="text/javascript">
	   window.location = "update_view_car.php"
	  </script>
	  <?php }       
     
?>