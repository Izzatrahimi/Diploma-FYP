<?php 
// Include database connection settings
include('../connection/dbconn.php');

include ("../register/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
				$user_name = $_SESSION['username'];
				$sqlUSER = "SELECT * FROM user where username = '$user_name' ";
				$queryUSER = mysqli_query($dbconn, $sqlUSER) or die ("Error: " . mysqli_error());
				$rowUSER = mysqli_num_rows($queryUSER);
				$rUSER= mysqli_fetch_assoc($queryUSER);
				$user_id = $rUSER['id'];
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

<div class="greetinguser">
  <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
  <h3>Megalodon Zoo Visitor Dashboard</h3>
</div>
<br><br><br><br><br><br><br>

<div class="main2">
<div class="container">
<br>
<?php
	$query = "SELECT * FROM book b, book_detail bd, user u
			 WHERE b.user_id ='$user_id' AND b.book_id = bd.book_id AND b.user_id=u.id";
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$numrow = mysqli_fetch_array($result);
	
?>

<fieldset style="border: 0;">

<form name="edit_user" method="POST" action="db_update_book.php">

    <table width="90%" border="1" align="center" style = "margin-top: 30px;">
      <tr align="left">
        <td width="16%" style = "border: 0; background-color: #e0e0e0;">&nbsp;</td>
        <td width="84%" style= "border: 0; background-color: #e0e0e0;">
          <input type="hidden" name="id" value=" <?php echo ($numrow['book_id']); ?> " />
        </td>
      </tr> 

      <tr>
        <td width="30%" style = "border: 0; background-color: #e0e0e0;">Member Name : </td>
        <td style = "border: 0; background-color: #e0e0e0;"><?php echo ucwords (strtolower($rUSER['name'])); ?> </td>
      </tr>

      <tr>
        <td width="30%" style = "border: 0; background-color: #e0e0e0;">Phone No : </td>
        <td style = "border: 0; background-color: #e0e0e0;"><?php echo $rUSER['phone']; ?></td>
      </tr>

    </table>
	
	<br>
	
		<?php
		$query1 = "SELECT * FROM book  WHERE user_id ='$user_id' ";
		$result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
		$numrow1 = mysqli_num_rows($result1);
	?>
	
	<table width="90%" border="1" align="center" style="margin-bottom: 15px;">
	<tr align="left">
		<th width="4%">No</th>
        <th>Booking ID</th>
        <th>Booking Date</th>
        <th>Visit Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
	  
      <?php

	  for ($a=0; $a<$numrow1; $a++) {
		$row1 = mysqli_fetch_array($result1);
		
	
			echo "<tr>"
	  ?>

    <td>&nbsp;<?php echo $a+1; ?></td>
    <td>&nbsp;<?php echo ucwords (strtolower($row1['book_id'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['book_date'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['visit_date'])); ?></td>
		<td>&nbsp;<?php echo ucwords (strtolower($row1['status'])); ?></td> 

	  <?php if($row1['status']== 'complete')
					echo "<td ><a href= 'dbreceipt.php?book_id=".$row1['book_id']."'>receipt</a></td>";
				else
					echo "<td><label>verifying...</label></td>";
		  
		?>
  </tr> 
            <?php 
      
	   }
	    ?>  
	 
      <tr> 
        <td colspan="6">
      
        <input type="button" name="cancel" class = "button1" value=" Add Booking " onclick="location.href='add_book_car.php'" />
		</td>
      </tr>
    </table>
	
	
</form>
</fieldset><br>
</div></div><br><br>
   
</body>
</html> 


























