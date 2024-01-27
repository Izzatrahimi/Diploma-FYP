<?php 
include('../connection/dbconn.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
	$name=$_POST['name'];
	$address=$_POST['address'];
    $phone=$_POST['phone'];
	$email=$_POST['email'];
    $level_id=$_POST['level_id'];
	
	 $sql0 = "INSERT into user (username,password,name,address,phone,email,level_id)
    values ('$username','$password','$name','$address','$phone','$email','$level_id')";
    $result = mysqli_query($dbconn,$sql0);
    if($result){

    echo "<script>window.location='../register/login.php'</script>";
    }
    else{
    echo"<script>alert('Data already exist');
    window.location='../register/login.php'</script>";}
    mysqli_close($dbconn);
?>