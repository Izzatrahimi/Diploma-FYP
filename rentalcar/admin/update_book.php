<?php 
// Include database connection settings
include('../connection/dbconn.php');
include ("../register/session.php");
session_start();
$user = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
		$bookid = $_GET['id'];		
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

<div class="container">

<h3 style="color: white">Verify Book</h3>

<?php

	$query = "SELECT * FROM book WHERE book_id = $bookid";
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$numrow = mysqli_fetch_array($result);
	$user_id = $numrow['user_id'];
	$query2 = "SELECT * FROM user 
			 WHERE id ='$user_id' ";
	$result2 = mysqli_query($dbconn, $query2) or die ("Error: " . mysqli_error($dbconn));
	$row2 = mysqli_fetch_array($result2);
?>


<form name="edit_user" method="POST" action="db_update_book.php">

    <table width="80%" border="0" align="center">
	 <tr>
        <td width="16%">Booking ID</td>  
        <td width="84%">
		 <?php echo ucwords (strtolower($numrow['book_id'])); ?>
		 <input type="hidden" name="id" value=" <?php echo ($numrow['book_id']); ?> " />
		</td>
      </tr>  
      <tr>
        <td width="16%">Booking Date </td>  
        <td width="84%"> <?php echo ucwords (strtolower($numrow['book_date'])); ?> </td>
      </tr>  
	   <tr>
        <td width="16%">Visit Date </td>  
        <td width="84%"> <?php echo ucwords (strtolower($numrow['visit_date'])); ?> </td>
      </tr>  
      
	  <tr>
        <td width="16%">Member Name</td>
        <td><?php echo ucwords (strtolower($row2['name'])); ?> </td>
      </tr>
	  <tr>
        <td width="16%">Phone No</td>
        <td><?php echo $row2['phone']; ?></td>
      </tr>
	  <tr>
        <td width="16%">Status</td>
        <td><?php echo ucwords (strtolower($numrow['status'])); ?> </td>
      </tr>
    </table>
	
	<br><br>
	
		<?php
		$query1 = "SELECT * FROM book b, book_detail bd, car c  WHERE b.book_id ='$bookid' AND b.book_id = bd.book_id AND bd.car_id = c.car_id";
		$result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
		$numrow1 = mysqli_num_rows($result1);
	?>
	
	<table width="80%" border="0" align="center">
	<tr align="left">
		<th width="3%">No</td>
        <th width="23%">Car ID</th>
        <th width="23%">Car Name</th> 		
        <th width="17%">Quantity</th>

      </tr>
	  
      <?php

	  for ($a=0; $a<$numrow1; $a++) {
		$row1 = mysqli_fetch_array($result1);
		
	
			echo "<tr>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row1['car_id'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['car_name'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['qty'])); ?></td>  
       </tr> 
            <?php 
      
	   }
	    ?>  
	  <tr> 
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr> 
        <td colspan="4"><input type="submit" name="submit" class = "button1" value=" Verify Book" />
        <input type="button" name="cancel" class = "button1" value=" Cancel " onclick="location.href='view_book.php'" /></td>
      </tr>
    </table>
  </form>

</div>
<br><br>
   
</body>

</html> 


























