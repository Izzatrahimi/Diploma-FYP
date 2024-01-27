<?php
// Include database connection settings
include('../connection/dbconn.php');

include ("../register/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
    }

$car_id = $_GET['car_id'];    
?> 

<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="style4.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

</head>

<body>

  <div class="navbar">
  
  <img src="../img/logo.png" style="float: left; width: 85px; height: 75px;">
  <a href="user.php">HOME</a>

  <!--<a href="login/index.html">LOGIN</a>
  <a href="signup/index.html">SIGNUP</a>-->
  <div class="dropdown">
      <button class="dropbtn">USER<i class="fa fa-caret down"></i></button>
      <div class="dropdown-content">
        <a href="view_user.php">View</a>
        <a href="update_user.php">Update</a>
      </div>
    </div>
    
    <div class="dropdown">
      <button class="dropbtn">CAR<i class="fa fa-caret down"></i></button>
      <div class="dropdown-content">
        <a href="view_car.php">View</a>
        <a href="search_car.php">Search</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">BOOKING<i class="fa fa-caret down"></i></button>
      <div class="dropdown-content">
        <a href="add_book_car.php">Add</a>
        <a href="view_book.php">View</a>
      </div>
    </div>
    <a href="../register/logout.php" style="float: right;">Logout</a>
  </div>
</div>
<br><br>

<div class="container">

<h3 style="color: white">Car Detail</h3>

<?php
  $query = "SELECT * FROM car WHERE car_id='$car_id'";
  $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
  $row = mysqli_fetch_array($result);
?>

<br>

<fieldset>

<form name="edit_user" method="post" action="db_update_user.php" enctype="multipart/form-data">
    <table width="100%" border="0" align="center">
      <tr>
        <td width="16%">Car Image</td>  
        <td width="84%">
          <img src="<?php echo ucwords (strtolower($row['car_image'])); ?>" width="40%">
        </td>  
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
        <td>RM <?php echo $row['car_price']; ?> /day</td> 
      </tr>   
    
      <tr> 
        <td colspan="2">
          <input type="button" class = "button1" name="cancel" value="Back " onclick="location.href='view_car.php'"/>
          <input type="button" class = "button1" name="book" value="Book " onclick="location.href='add_book_car.php'"/>
        </td>
      </tr>
    
    </table>
</form>

</fieldset>
 
</div>

</body>
</html> 
