<?php
// Check user input email is equal to accout email, if equal take user id and whole details to change password
session_start();

	$username = $_SESSION['PassUsername'];
	$email = $_SESSION['PassEmail'];
	$password = $_SESSION['PassPwd'];
	$name = $_SESSION['PassName'];
	$address = $_SESSION['PassAddress'];
	$phone = $_SESSION['PassPhone'];
	$level_id = $_SESSION['PassLevel_ID'];

	$newpassword = $_POST['Cpassword'];

	$conn = new mysqli('localhost','root','','rentalcar');


	$query = "UPDATE user SET password = '$newpassword' WHERE email = '$email' AND username = '$username'";
	if(mysqli_query($conn, $query))
	{
    	echo "YOUR PASSWORD IS SUCCESSFULLY RESET";
	}
	else 
	{
    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>