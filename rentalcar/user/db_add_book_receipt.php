<!DOCTYPE html>
<?php 
include('../connection/dbconn.php');

include ("../register/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		}

    $user_name = $_SESSION['username'];
    $sqlUSER= "SELECT * FROM user where username = '$user_name' ";
    $queryUSER = mysqli_query($dbconn, $sqlUSER) or die ("Error: " . mysqli_error());
		$rowUSER = mysqli_num_rows($queryUSER);
		$rUSER= mysqli_fetch_assoc($queryUSER);
		$user_id = $rUSER['id'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("Y-m-d");
    $time = date("H:i:s");
		
?>
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
                            
                if(isset($_POST['submit']))
                {
               
					$dateo = $_POST['dateo'];
					$datep = $_POST['datep'];
					
					$pstatus="processing";
					$method = $_POST['method'];
					$row = $_POST['bil'];
					
                    $oid = "oid";
                    $pid = "pid";
                    $pname = "pname";
					$pcat = "pcat";
					$psize = "psize";
                    $quantity = "quantity";	
                    $pprice = "carPrice";
  				
					$sql= "SELECT * FROM book";
					$query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
					$rows = mysqli_num_rows($query);
					$book_id = 1;
					   
                    if($rows!=0)
                        {
                            $book_id = $rows + 1;
                        }
                                
                    echo "<form id='recipt' name='recipt' method='post' action=''>
                      <table width=\"680\" border=\"0\" align=\"center\">
                        <tr>
                          <td colspan=\"5\" align=\"center\"><b>INVOICE</b></td>
                        </tr>
						<tr>
                          <td colspan=\"5\" align=\"center\">Rental Car</td>
                        </tr>
                        <tr>
                          <td colspan=\"5\" align=\"center\">Great deals</td>
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
                          <td colspan=\"4\">: ".ucwords (strtolower ($method))."</td>
                        </tr>
                        <tr>
                          <td>Booking Date</td>
                          <td colspan=\"4\">: &nbsp;".$date."&nbsp;&nbsp;Time &nbsp;".$time."</td>
                        </tr>
						<tr>
                          <td>Visit Date</td>
                           <td colspan=\"4\">: &nbsp;".$datep."&nbsp;&nbsp;</td>
                        </tr>
						
						
                        <tr>
                          <td colspan=\"5\"><hr /></td>
                        </tr>
                        <tr>
                          <td width=\"45\">Code</td>
                          <td width=\"1000\">Ticket Type</td>
                          <td width=\"45\">Price(RM)</td>
                          <td width=\"45\">Quantity</td>
                          <td width=\"45\">Total</td>
                        </tr>";
                        
                        $itemCount = 0;
                        $totalPrice = 0;
                       
                        
                     
                        for($a=0;$a<$row;$a++)
                        {
                            $strpid = $_POST[''.$pid.$a.''];
                            $strQuantity = $_POST[$quantity.$a];	
                            $strPrice = $_POST[$pprice.$a];	

							$sqlf= "SELECT * FROM car WHERE car_id = '$strpid'";
							$queryf = mysqli_query($dbconn, $sqlf) or die ("Error: " . mysqli_error());
							$rowf = mysqli_num_rows($queryf);
							$rf= mysqli_fetch_assoc($queryf);
					
							$sPid = $rf['car_id'];
							
                            //buat pengiraan utk total setiap line dan quantity
                            if($strQuantity > 0)
                            {
                                $sqlordersdetail = "INSERT INTO book_detail (book_id, car_id, qty) 
												   VALUES('".$book_id."', '".$sPid."', '".$strQuantity."')";
                                mysqli_query($dbconn,$sqlordersdetail  ) or die ("Error: " . mysqli_error($dbconn));
                                $strTotal = ($strPrice * intval($strQuantity));
                                
                                echo "<tr>
                                  <td>".$sPid."</td>
                                  <td>".$rf['car_name']."</td>
                                  <td>".$strPrice."</td>
                                  <td>".$strQuantity."</td>
                                  <td>".$strTotal."</td>
                                </tr>";
                                $itemCount = $itemCount + intval($strQuantity);
                                $totalPrice = $totalPrice + (intval($strQuantity) * $strPrice);
                            }
                        }
                        
                        $sqlorders = "INSERT INTO book (user_id, book_date, visit_date,  status ,method_payment)
                        VALUES('".$user_id."', '".$date."', '".$datep."', '".$pstatus."' ,'".$method."')";
                        mysqli_query($dbconn,$sqlorders ) or die ("Error: " . mysqli_error($dbconn));
                       
                
                        echo"
                        <tr>
                          <td colspan=\"5\"><hr /></td>
                        </tr>
                        <tr>
                          <td colspan=\"4\">Item Count</td>
                          <td colspan=\"1\" align=\"right\">".$itemCount."</td>
                        </tr>
                        <tr>
                          <td colspan=\"4\">Grand Total(RM)</td>
                          <td colspan=\"1\" align=\"right\">".$totalPrice."</td>
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
                }
      ?>
    </fieldset> 
</div><br><br><br><br>

</body>
</html>