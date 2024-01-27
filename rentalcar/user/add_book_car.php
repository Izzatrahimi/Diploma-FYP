<!DOCTYPE html>
<?php 
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

                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date = date("d/m/Y");
                $time = date("H:i:s");
  
?>
<html>
<head>

  <link rel="stylesheet" href="style4.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

<script type = "text/javascript">
function calc() 
{
var total = 0;
var rowNo = order.elements["bil"].value;
var qCar = "quantity";
var pCar ="carPrice";

for (a=0;a<rowNo;a++)
{
  var textRow = a.toString();
  var textQuantity = qCar + textRow;
  var textPrice = pCar + textRow;
  var quantity = parseInt(order.elements[textQuantity].value)
  var pPrice = parseInt(order.elements[textPrice].value);
  total = total + (quantity * pPrice);
}
document.getElementById("price").value = total;
document.getElementById("cash").min = total;
}

</script>

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

<div class="main2">
<div class="container">
<br>
<h3 style="color: white;">Add Booking</h3><br>

<fieldset style="background-color: #e0e0e0; margin-left: 15px;">

<form name="order" method="POST"  action="db_add_book_receipt.php">
  <br>
    <table width="100%" align="center">
      <tr>
        <td width="20%">Member Name</td>  
        <td width="">
          <?php echo $rUSER['name'] ?>
      
        <?php
          while($rUSER= mysqli_fetch_assoc($queryUSER)){
            $vist_name = $rUSER['name'];
            $user_id = $rUSER['id'];
            echo"<option value='$user_id'>$vist_name</option>";?>
            
        <?php
          }
        ?>
          
        </td>
      </tr>  

      <tr> 
        <td>Book Date</td>
        <td><input type="date" name="dateo" size="50" hidden /><?php echo $date?></td>
      </tr>
    <tr>
        <td>Visit Date</td>
        <td><input type="date" id="datep" name="datep" min="<?php echo date("Y-m-d"); ?>"></td>
      </tr>
 
      <?php
        $sql= "SELECT * FROM car ORDER BY car_name";
        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
        $row = mysqli_num_rows($query);
  
        echo "<table border='1' width='100%'  align='center'>";
        echo "<tr>
        <td width='5%'>Code</td>
        <td width='30%'>Car Name</td>
        <td width='5%'>Price(RM) /day</td>
        <td width='20%'>Quantity</td>
        </tr>";

        $strOid = "oid";
        $strPid = "pid";
        $strPname = "pname";
        $strPcat = "pcat";
        $strPsize = "psize";        
        $strQuantity = "quantity";  
        $strPrice = "carPrice";
        $strTotal = "total";  
        $no=0;  
                
        echo "<input type='text' name='bil' id='bil' value=".$row." hidden>";
                  
                        
        while ($r = mysqli_fetch_assoc($query))
        { 
          $carName = $r['car_name'];
          $carStatus = $r['car_status'];
          
          $pid = $r['car_id'];
          $carPrice = $r['car_price'];
          if($carStatus == 1)
          {
            echo "<tr>
            <td><center><input type='hidden' class='center' name=".$strPid.$no." id=".$strPid.$no." value =".$r['car_id'].">".$r['car_id']."</td>
            <td>".$r['car_name']."</td>
            <td><center><input type='hidden' class='center' name=".$strPrice.$no." id=".$strPrice.$no." value =".$r['car_price']." readonly'>".$r['car_price']."</td>
            <td><center><input type='number' name=".$strQuantity.$no." id=".$strQuantity.$no." min='0' max='100' value='0'></td>
            </tr>";
            $no++;
          }
          else
          {
            echo "<tr hidden>
            <td><center><input type='hidden' class='center' name=".$strPid.$no." id=".$strPid.$no." value =".$r['car_id'].">".$r['car_id']."</td>
            <td>".$r['car_name']."</td>
            <td><center><input type='hidden' class='center' name=".$strPrice.$no." id=".$strPrice.$no." value =".$r['car_price']." readonly'>".$r['car_price']."</td>
            <td><center><input type='hidden' name=".$strQuantity.$no." id=".$strQuantity.$no." value='0' >Not Available</td>
            </tr>";
            $no++;
          }
        }

        echo "<tr>
        <td colspan='2'>&nbsp;</td>
        <td>
        <center><input type='button' name='calculate' class = 'button1' id='calculate' onClick='calc()' value='Calculate'></center></td>
        <td><input type='text' name='price' id='price' value='0'></td>
        </tr>

        <tr>
        <td colspan='2'><input type='radio' id='method'name='method' value='bank online' required>
        <label for='html'>Bank Online</label><br>
        <input type='radio' id='method'name='method' value='credit card / debit card'>
        <label for='html'>Credit Card / Debit Card</label><br></td>
        <td><center><input type='submit' name='submit' class = 'button1' id='submit' value='Pay'></center></td>
        <td align='center' colspan='4'>
        <input type='reset' name='reset' class = 'button1' id='reset' value='   Reset   ' />  
        </td>
        </tr>
                    ";
                echo "</table>";
                               
                ?>
    
      <tr> 
        <td colspan="2">
    
    </td>
      </tr>   
    
      <tr> 
        <td colspan="2"></td>
      </tr>
    
    </table>
</form>

</fieldset>
</div>
</div>

<br><br>
   
</body>

</html> 
