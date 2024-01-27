<!DOCTYPE html>
<?php 
include ("../register/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
		
?>
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

<br>
<div class="container" style="margin-top: ;">

<h3 style="color: white">Add Car Data</h3>
<br>

<form name="add_product" method="post" action="db_add_car.php" enctype="multipart/form-data">
    <table width="96%" border="0" align="center" style="margin-left: 10px">
      <tr>
        <td width="25%">Car Image</td>  
        <td><input type="text" name="car_image" size="50" /></td>  
      </tr>  
	   <tr>
        <td width="25%">Status</td>  
        <td><select name="status" id="car_status"required >

             <option value="" disabled selected>Select Status</option>
             <option value="1">Available</option>
			  <option value="2">Not Available</option>
			  </select>
		</td>  
      </tr>

      <tr>
        <td>Year</td>
        <td><input type="text" name="car_year" size="50" /></td> 
      </tr>
     
      <tr>
        <td>Name</td>
        <td><input type="text" name="car_name" size="50" /></td> 
      </tr>

       <tr>
        <td>Price (RM) /day</td>
        <td><input type="text" name="car_price" size="50" /></td> 
      </tr>    
	  
      <tr> 
        <td colspan="2" style="text-align: center;"><input type="submit" name="submit" class = "button1" value=" Save " />
        <input type="button" class = "button1" name="cancel" value=" Cancel " onclick="location.href='update_view_car.php'" style="text-align: center;" /></td>
      </tr>
	  
    </table>
</form>
 
</div>
<br><br>
   
</body>

</html> 
