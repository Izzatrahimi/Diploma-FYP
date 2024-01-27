<!DOCTYPE html>
<?php 


		
?>
<html>
<head>

  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

</head>
<body>

<nav>
  <a href="index.html"><img src="img/logo.png"></a>
  <div class="nav-links" id="navLinks">
    <i class="fa fa-times" onclick="hideMenu()"></i>
    <ul>
      <li><a href="index.html">HOME</a></li>
      <li><a href="about.html">ABOUT</a></li>
      <li><a href="#ticket">RENTAL</a></li>
      <li><a href="register/login.php">LOGIN</a></li>
      <li><a href="contact.html">CONTACT</a></li>
      <li><a href="add_feedback.php">FEEDBACK</a></li>
    </ul>
  </div>
  <i class="fa fa-bars" onclick="showMenu()"></i>
</nav>

<br>
<div class="container">

<h3 style="color: white">Give us your feedback!</h3>
<br>

<form name="add_product" method="post" action="db_add_feedback.php" enctype="multipart/form-data">
    <table>
      <tr>
        <td width="25%">Name</td>  
        <td><input type="text" name="name" size="50" required /></td>  
      </tr>
      <tr>
        <td width="25%">Email</td>  
        <td><input type="text" name="email" size="50" required /></td>
      </tr>

      <tr>
        <td>Subject</td>
        <td><input type="text" name="subject" size="50" required /></td> 
      </tr>
     
      <tr>
        <td>Message</td>
        <td><textarea name="message" rows="11" cols="53" required></textarea></td> 
      </tr>
	  
      <tr> 
        <td colspan="2" style="text-align: center;"><input type="submit" name="submit" class = "hero-btn2" value=" Save " />
        <input type="reset" class = "hero-btn3" name="cancel" value=" Cancel " style="text-align: center;" /></td>
      </tr>
	  
    </table>
</form>
 
</div>
<br><br>

<!---footer--------------------------------------------------->
  <section class="footer">
        <div class="container text-center">
            <p>Copyright &copy; 2021 HTML. Designed By <a href="#">Izzat Rahimi</a></p>
        </div>
    </section>

<!---JavaScript for toggle Menu-------------------------------->

  <script>
    var navLinks = document.getElementById("navLinks");
    function showMenu(){
      navLinks.style.right = "0";
    }
    function hideMenu(){
      navLinks.style.right = "-200px";
    }
  </script>
   
</body>

</html> 
