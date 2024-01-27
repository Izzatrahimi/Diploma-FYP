<?php 
// Include database connection settings
include('../connection/dbconn.php');
include ("../register/session.php");
session_start();
$user = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
$id = $_GET['id'];		
?>

<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="style3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

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
<br><br>

<div class="container">

<h3 style="color: white">Update User Data</h3>

<?php
	$query = "SELECT * FROM user WHERE id='$id'";
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$row = mysqli_fetch_array($result);
?>

<fieldset >

<form name="edit_user" method="post" action="db_update_user.php" enctype="multipart/form-data">
    <table width="100%" border="0" align="center">
      <tr>
        <td width="16%">Name</td>  
        <td width="84%"><input type="text" name="name" size="50" value="<?php echo ucwords (strtolower($row['name'])); ?>" /></td>  
      </tr>  
      
	  <tr>
        <td width="16%">Email</td>
        <td><input type="text" name="email" size="50" value="<?php echo $row['email']; ?>"/></td>
      </tr>
	  <tr>
        <td width="16%">Phone No</td>
        <td><input type="text" name="phone" size="50" value="<?php echo $row['phone']; ?>"placeholder = "Example: 01X-XXXXXXX"pattern="[0-9]{3}-[0-9]{7}"/></td>
      </tr>
      <tr>
        <td width="16%">Address</td>
        <td><textarea name="address" cols="47" rows="3"><?php echo ucwords (strtolower($row['address'])); ?></textarea></td>
      </tr>
      <tr>
        <td width="16%">Username</td>
        <td><?php echo $row['username']; ?>
        	<input type="hidden" name="username" size="50" value="<?php echo $row['username']; ?>" /></td> 
      </tr>
      <tr>
        <td width="16%">Password</td>
        <td><input type="password" name="password" size="50" value="<?php echo $row['password']; ?>" /></td> 
      </tr>
      <tr> 
        <td colspan="2"><input type="submit" class = "button1" name="submit" value=" Save " />
        <input type="button" name="cancel" class = "button1" value=" Cancel " onclick="location.href='update_view_user.php'" /></td>
      </tr>
	  
    </table>
</form>

</fieldset>
 
</div>
<br><br>
   
</body>

</html> 


























