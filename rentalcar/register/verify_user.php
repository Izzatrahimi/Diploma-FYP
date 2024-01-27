<?php
// Check user input email is equal to accout email, if equal take user id and whole details to change password
session_start();
	
	$username= "";
	$password = "";
	$name="";
	$address="";
    $phone="";
    $email = $_POST["userverifyEmail"];
    $level_id="";

	$conn = new mysqli('localhost','root','','rentalcar');


	$query = "SELECT * FROM user WHERE email = '$email'";
	$result = $conn->query($query);
	if ($result) 
	{
		if (mysqli_num_rows($result) > 0) 
		{
			while ($row = mysqli_fetch_row($result)) 
			{
				$username = $row[1];
				$password = $row[2];
				$name = $row[3];
				$address= $row[4];
				$phone= $row[5];
				$level_id=$row[7];
				$email = $row[6];
				

				echo("$username 's EMAIL VERIFIED");
  			}
  			mysqli_free_result($result);
		}
    	else 
    	{
    		echo "EMAIL DOES NOT EXISTS IN THIS SYSTEM";
    	}
	}

	$_SESSION['PassUsername'] = $username;
	$_SESSION['PassEmail'] = $email;
	$_SESSION['PassPwd'] = $password;
	$_SESSION['PassName'] = $name;
	$_SESSION['PassAddress'] = $address;
	$_SESSION['PassPhone'] = $phone;
	$_SESSION['PassLevel_ID'] = $level_id;
	mysqli_close($conn);
?>