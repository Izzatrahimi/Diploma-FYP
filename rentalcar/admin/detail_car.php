<?php 
// Include database connection settings
include('../connection/dbconn.php');
include ("../register/session.php");
session_start();
$user = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
$car_id = $_GET['car_id'];		
?>

<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="style3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="navbar">
  
  <img src="../img/logo.png" style="float: left; width: 85px; height: 75px;">
  <a href="admin.php">HOME</a>
  
  <!--<a href="login/index.html">LOGIN</a>
  <a href="signup/index.html">SIGNUP</a>-->
  <div class="dropdown">
      <button class="dropbtn">USER<i class="fa fa-caret down"></i></button>
      <div class="dropdown-content">
        <a href="view_user.php">View</a>
        <a href="update_view_user.php">Update</a>
        <a href="search_user.php">Search</a>
      </div>
    </div>
    
    <div class="dropdown">
      <button class="dropbtn">CAR<i class="fa fa-caret down"></i></button>
      <div class="dropdown-content">
        <a href="add_car.php">Add</a>
        <a href="view_car.php">View</a>
        <a href="update_view_car.php">Update</a>
        <a href="search_car.php">Search</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">BOOKING<i class="fa fa-caret down"></i></button>
      <div class="dropdown-content">
        <a href="add_book.php">Add</a>
        <a href="view_book.php">View</a>
        <a href="update_view_book.php">Update</a>
        <a href="search_book.php">Search</a>
      </div>
    </div>
	 <div class="dropdown">
      <button class="dropbtn">REPORT<i class="fa fa-caret down"></i></button>
      <div class="dropdown-content">
        <a href="report.php">BOOKING</a>
        <a href="feedback.php">FEEDBACK</a>
        
      </div>
    </div>
	
    <a href="../register/logout.php" style="float: right;">Logout</a>
  </div>
</div>
	
  </div>    
</div>

<div class="main">
  <div class="greetinguser">
	<h1><?php echo $user; ?></h1>
	<h3>Rental Car Administrator Dashboard</h3>
  </div> 
</div>
<br><br><br><br><br><br><br>

<div class="container">

<h3 style="color: white">Car Detail</h3>

<?php
	$query = "SELECT * FROM car WHERE car_id='$car_id'";
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$row = mysqli_fetch_array($result);
?>

<fieldset >

<form name="edit_user" method="post" action="db_update_user.php" enctype="multipart/form-data">
    <table width="100%" border="0" align="center">
      <tr>
        <td width="16%">Car Image</td>  
        <td width="84%"><?php echo ucwords (strtolower($row['car_image'])); ?></td>  
      </tr>  
      <tr> 
        <td width="16%">Year</td>
        <td><?php echo ucwords (strtolower($row['car_year'])); ?></td>
      </tr>
      <tr>
        <td width="16%">Name</td>
        <td><?php echo $row['car_name']; ?></td> 
      </tr>
      <tr>
        <td width="16%">Price</td>
        <td>RM <?php echo $row['car_price']; ?></td> 
      </tr>   
	  
      <tr> 
        <td colspan="2"><input type="button" class = "button1" name="cancel" value="Back " onclick="location.href='view_car.php'" /></td>
      </tr>
	  
    </table>
</form>

</fieldset>
 
</div>
   
</body>

</html> 


























