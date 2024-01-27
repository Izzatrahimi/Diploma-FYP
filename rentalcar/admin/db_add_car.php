<?php 
include('../connection/dbconn.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}

$addrecord = "INSERT INTO car (car_image, car_status, car_year, car_name, car_price) 
			  VALUES('$valuearr[0]', '$valuearr[1]', '$valuearr[2]', '$valuearr[3]', '$valuearr[4]')";
//echo $addrecord;
	  $result = mysqli_query($dbconn, $addrecord) or die ("Error: " . mysqli_error($dbconn));

if ($result) {
?>
<script type="text/javascript">
	window.location = "update_view_car.php"
</script>
?>
<?php } ?>