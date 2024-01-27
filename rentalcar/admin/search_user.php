<?php 
// Include database connection settings
include('../connection/dbconn.php');
include ("../register/session.php");
session_start();
$user = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
		
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

<div class="main">
  <div class="greetinguser">
	<h1><?php echo $_SESSION['username']; ?></h1>
	<h3>Rental Car Administrator Dashboard</h3>
  </div> 
</div>
<br><br><br><br><br><br><br>

<div class="container">

<h3 style="color: white">Search User Data</h3><br>

<fieldset>

<b style="margin-left: 15px; color: white;">Enter User Name</b>
<br><br>

<form name="form1" method="post" action="db_search_user.php" enctype="multipart/form-data">
    <table width="95%" border="0" align="center" style="margin-left: 10px;">
      <tr>
        <td width="20%">User Name</td>  
        <td width="90%"><input type="text" name="search_name" size="50" />
      </tr>  
       <tr> 
        <td align="center" colspan="2"><input type="submit" name="submit" class = "button1" value=" Search " />
        <input type="button" name="cancel" class = "button1" value=" Cancel " onclick="location.href='view_user.php'" /></td>
      </tr>
    </table>
</form>
<br>

</fieldset>
 
</div><br><br>
   
</body>

</html> 


























