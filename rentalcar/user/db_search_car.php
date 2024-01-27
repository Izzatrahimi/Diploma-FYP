<?php 
// Include database connection settings
include('../connection/dbconn.php');
include ("../register/session.php");
session_start();
$user = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
        header('Location: ../login');
    } 
/* capture search_name */
$carsearch = $_POST['search_car'];
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

<div class="container">

<h3 style="color: white">Search Car Data </h3>
<br>
<fieldset>
  
  <?php
    
    /* execute SQL statement */
    $query= "(SELECT * FROM car WHERE car_name LIKE '%$carsearch%' )";
    $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
    $numrow = mysqli_num_rows($result);
    
  ?>
   <tr align="left">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left">
        <th width="3%">No</td>
        <th width="28%">Car Name</th>       
       
        <th width="9%">Price (RM) /day</th>
        <th align="center">Action</th>
      </tr>
    
      <?php
    $color="1";
    
    for ($a=0; $a<$numrow; $a++) {
    $row = mysqli_fetch_array($result);
    
    if($color==1){
      echo "<tr>"
    ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['car_name'])); ?></td>
          
        <td>&nbsp;<?php echo $row['car_price']; ?></td>
        <td width="5%" align="center"><a class="one" href="detail_car.php?car_id=<?php echo $row['car_id'];?>"><button class = "button1">Detail</button></a></td>
       </tr> 
      <?php 
       $color="2";}
     else{
     echo "<tr>"
    ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['car_name'])); ?></td>   
       
        <td>&nbsp;<?php echo $row['car_price']; ?></td>
        <td width="5%" align="center"><a class="one" href="detail_car.php?car_id=<?php echo $row['car_id'];?>"><button class = "button1">Detail</button></a></td>
      </tr>
     <?php
      $color="1";
     }
    } 
    if ($numrow==0)
      {
     echo '<tr>
            <td colspan="8"><font color="#FF0000">No record available.</font></td>
         </tr>'; 
    }
    ?>
    </table>

</fieldset>
 
    
</div>
   
</body>

</html> 


























