<?php 
include('connection/dbconn.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}

$addrecord = "INSERT INTO feedback (name, email, subject, message) 
			  VALUES('$valuearr[0]', '$valuearr[1]', '$valuearr[2]', '$valuearr[3]')";
//echo $addrecord;
	  $result = mysqli_query($dbconn, $addrecord) or die ("Error: " . mysqli_error($dbconn));

if ($result) {

echo"<script>alert('Thankyou for your feedback!');
    window.location='index.html'</script>";} 

?>