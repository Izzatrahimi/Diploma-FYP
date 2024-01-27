<?php 
include('../connection/dbconn.php');

include ("../register/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		}
    $sqlUSER= "SELECT * from user";
		$queryUSER = mysqli_query($dbconn, $sqlUSER) or die ("Error: " . mysqli_error());
		$rowUSER = mysqli_num_rows($queryUSER);
		$rUSER= mysqli_fetch_assoc($queryUSER);
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("Y-m-d");
    $time = date("H:i:s");
		$book_id = $_GET['book_id'];
		
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

<h3></h3>

<fieldset style = "border: 0;">

          		<!--  (Recipt Code)  -->
				<?php
                     $sql1= "SELECT * FROM book b, book_detail bd, user u
							WHERE b.book_id ='$book_id' AND b.book_id = bd.book_id AND b.user_id=u.id";
						$query1 = mysqli_query($dbconn, $sql1) or die ("Error: " . mysqli_error());
						$r1= mysqli_fetch_assoc($query1);
       
                    echo "<form id='recipt' name='recipt' method='post' action=''>
                      <table width=\"680\" border=\"0\" align=\"center\">
                        <tr>
                          <td colspan=\"5\" align=\"center\"><b>RECEIPT</b></td>
                        </tr>
						<tr>
                          <td colspan=\"5\" align=\"center\">Rental Car</td>
                        </tr>
                        <tr>
                          <td colspan=\"5\" align=\"center\">Rent Car With Great Deals</td>
                        </tr>
                        <tr>
                          <td colspan=\"5\"></td>
                        </tr>
                        <tr>
                          <td colspan=\"5\"></td>
                        </tr>
                        <tr>
                          <td>Booking ID</td>
                          <td colspan=\"4\">: ".$book_id."</td>
                        </tr>
						<tr>
                          <td>Payment Method</td>
                          <td colspan=\"4\">: ".ucwords (strtolower ($r1['method_payment']))."</td>
                        </tr>
						
                        <tr>
                          <td>Booking Date</td>
                          <td colspan=\"4\">: &nbsp;".$r1['book_date']."&nbsp;&nbsp;Time &nbsp;".$time."</td>
                        </tr>
						<tr>
                          <td>Visit Date</td>
                          <td colspan=\"4\">:  &nbsp;".$r1['visit_date']."&nbsp;&nbsp;</td>
                        </tr>
						
                        <tr>
                          <td colspan=\"5\"><hr /></td>
                        </tr>
						<tr>
                          <td width=\"45\">Code</td>
                          <td width=\"1000\">Name</td>
                          <td width=\"45\">Price(RM)</td>
                          <td width=\"45\">Quantity</td>
                          
                        </tr>"?>;
						<?php 
						
						 $sql2= "SELECT * FROM book_detail 
							WHERE book_id ='$book_id' ";
						$query2 = mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error());
						$numrow = mysqli_num_rows($query2);
						$total=0.00;
						$sum= 0;
					
						for ($a=0;$a<$numrow;$a++)
						{
							
							$r2= mysqli_fetch_assoc($query2);
							$car_id = $r2['car_id'];
							$sql3= "SELECT * FROM car where car_id = '$car_id'"; 
							$query3 = mysqli_query($dbconn, $sql3) or die ("Error: " . mysqli_error());
							$r3= mysqli_fetch_assoc($query3);
							$price= $r3['car_price'];
							$qty=$r2['qty'];
							
							$sum = $price * $qty;
							$total = $total + $sum;
							
						?>
						<?php echo"
            <tr>
            <td width=\"45\">".$r3['car_id']."</td>
            <td width=\"1000\">".$r3['car_name']."</td>
            <td width=\"45\">".$r3['car_price']."</td>
            <td width=\"45\">".$r2['qty']."</td>
            </tr>";
            }

            echo"
            <tr><td ></td><td width=\"45\">Grand Total(RM)</td>
						<td >".floatval($total)."</td>
            <td ></td> 
						</tr>
                        
            <tr>
            <td colspan=\"5\"><hr /></td>
            </tr>
            <tr>
            <td colspan=\"5\" align=\"center\">Thank You</td>
            </tr>
            <tr>
            <td colspan=\"5\" align=\"center\">Please Come Again</td>
            </tr>
            </table>
            </form>";
                
      ?>
    </fieldset>
</div>

<br><br>

</body>
</html>