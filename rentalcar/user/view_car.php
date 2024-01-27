<?php
// Include database connection settings
include('../connection/dbconn.php');

include ("../register/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
    } 
    
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

<section class="course">

  <span style="color: white;">Various Car Options</span>
  <h1 style="color: white;">Find Your Ideal Rental Car <br> And Book Online Now</h1>

  <div class="services-container">

  <?php
    $query = "SELECT * FROM car ORDER BY car_id";
    $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
    $numrow = mysqli_num_rows($result);
  ?>

  <?php
    $color="1";
    
    for ($a=0; $a<$numrow; $a++) {
    $row = mysqli_fetch_array($result);
    
    if($color==1){
      echo "<tr>"
    ?>

    <div class="box">
      <form method="post" action="detail_car.php?action=add&car_id=<?php echo $row["car_id"]; ?>">
        <div class="box-img">
          <img src="<?php echo $row["car_image"]; ?>" class="img-responsive img-curve">
        </div>

        <p>&nbsp;<?php echo $a+1; ?></p>
        <h3>&nbsp;<?php echo ucwords (strtolower($row['car_name'])); ?></h3>  
        <h2>&nbsp;RM <?php echo $row['car_price']; ?><span>/day</span></h2>
        <button class = "button1">Detail</button>
      </form>
    </div>

    <?php
    $color="2";}
    else{
      echo "<tr>"
    ?>

    <div class="box">
      <form method="post" action="detail_car.php?action=add&car_id=<?php echo $row["car_id"]; ?>">
        <div class="box-img">
          <img src="<?php echo $row["car_image"]; ?>" class="img-responsive img-curve">
        </div>

        <p>&nbsp;<?php echo $a+1; ?></p>
        <h3>&nbsp;<?php echo ucwords (strtolower($row['car_name'])); ?></h3>
        <h2>&nbsp;RM <?php echo $row['car_price']; ?><span>/day</span></h2>
        <button class = "button1">Detail</button>
      </form>
    </div>

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

</section>  

</body>
</html> 
