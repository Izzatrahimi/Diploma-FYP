<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

</head>

<body>

    <nav>
      <a href="index.html"><img src="../img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="../index.html">HOME</a></li>
            <li><a href="../about.html">ABOUT</a></li>
            <li><a href="#ticket">RENTAL</a></li>
            <li><a href="login.php">LOGIN</a></li>
            <li><a href="../contact.html">CONTACT</a></li>
            <li><a href="../add_feedback.php">FEEDBACK</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>


<section id="sec-549b">
    <div class="cont2">
        <h1>Reset Password</h1>
        <h2>Step 1</h2>
        <div>
            <form method = "POST" action = "verify_user.php" source="email" name="formLogin" id="cEmailForm">
                <div>
                    <label for="email-5c98" class="u-label">ENTER THE EMAIL YOU USED TO CREATE THIS ACCOUNT</label>
                    <input class="u-input" type="email" placeholder="Enter a your email address" id="email-5c98" name="userverifyEmail" required>
                </div>
                <div align="center" style="margin: 25px auto 0;">
                    <input type="submit" value="Verify User" name="btn_checkMail" class="hero-btn" onclick="checkemail()">
                </div>
            </form>

            <script type="text/javascript">
            function checkemail()
            {
              document.getElementById('cEmailForm').submit();
            }</script>
        </div>
    </div>
</section>



<section id="sec-3787">
    <div class="cont2">
        <h2>Step 2</h2>
        <div>
            <form method = "POST" action = "" source="email" name="form" id="email_form" onsubmit="ValidateDoubleClick()">
                <input type="hidden" name="_subject" value="Password Reset User Verification">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="TOKEN" value="" id="temptoken">
                <label  class="u-label"><p>GENERATE THE RESET​ PASSWORD TOKEN BY CLICKING THE BUTTON BELOW</p></label>
                <div align="center" style="margin: 25px auto 0;">
                    <input type="submit" value="Generate Token" id="btn_emailsub" class="hero-btn" onclick="SendEmail()">
                </div>
            </form>

            <script type="text/javascript">
            var storetemptoken="";
            var useremail="";
            function SendEmail()
            {
                var token = Math.floor(1000 + Math.random() * 9000);
                storetemptoken = token;
                document.getElementById('temptoken').value = storetemptoken;
                var actemail = "https://formsubmit.co/" + document.getElementById('email-5c98').value;
                document.getElementById('email_form').action = actemail;

                if(document.getElementById("email-5c98").value.length > 0)
                {
                   document.getElementById('email-5c98').readOnly = true;
                }
                useremail =document.getElementById('email-5c98').value;
            }
            function ValidateDoubleClick()
            {
                document.getElementById("btn_emailsub").disabled=true;
                //window.location.href = "http://localhost/BWBS/RPassword.html#sec-3787";
            }</script>
        </div>
    </div>
</section>


<section id="sec-166d">
    <div class="cont2">
        <h2>Step 3</h2>
        <div >
            <form method="POST" action="" source="email" name="formLogin"  id="Token_Form">
                <div >
                    <label for="tokenfield"  class="u-label" >ENTER THE TOKEN YOU RECEIVE FROM EMAIL</label>
                    <input class="u-input" type="text" placeholder="Enter the token" id="tokenfield" name="check_token" required>
                </div>
                <div align="center" style="margin: 25px auto 0;">
                    <input type="submit" value="Match Token" class="hero-btn" onclick="CheckToken()" id="btn_token">
                </div>
            </form>

            <script type="text/javascript">
            function CheckToken()
            {
              if(document.getElementById('tokenfield').value == storetemptoken)
              {
                // token validate success goto update password
                //window.location.href = "http://localhost/BWBS/RPassword.html#sec-c076";
                if(document.getElementById("tokenfield").value.length > 0)
                {
                  document.getElementById('tokenfield').readOnly = true;
                  document.getElementById('tokenfield').value = "User Verified. Please Update Your Password";
                  document.getElementById('btn_token').disabled=true;
                }
              }
              else
              {
                // token wrong type again
                  //window.location.href = "http://localhost/BWBS/RPassword.html#sec-3787";
                  document.getElementById('tokenfield').value="";
                  document.getElementById('tokenfield').placeholder="Incorrect Token,Please Try Again";
              }
            }</script>
        </div>
    </div>
</section>


<section id="sec-c076">
    <div class="cont2">
        <h2>Step 4</h2>
        <div>
            <form method="post" action="reset_process.php" source="email" name="formLogin" id="pr_form">
                <div>
                    <label for="test123">RESET YOUR PASSWORD</label>
                    <input class="u-input" type="password" placeholder="Reset your password" id="test123" name="NPassword" onkeyup="checkpasswordconfirm()" required>
                    <span><img style="width: 20px; height:20px;" src="../img/unsee.png" alt="" onclick="seeresetpassword()"></span>
                </div>
                <div>
                    <label for="text-6bc1">CONFIRM PASSWORD</label>
                    <input class="u-input" type="password" placeholder="Enter again password" id="text-6bc1" name="Cpassword" onkeyup="checkpasswordconfirm()" required>
                    <span ><img style="width: 20px; height:20px;" src="../img/unsee.png" alt="" onclick="seeresetcpassword()"></span>
                </div>
                <div align="center" style="margin: 25px auto 0;">
                    <input type="submit" value="Update" id="btn_resetpass" class="hero-btn" onclick="resetpass()">
                </div>
                <div id="snackbar" align="center">PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH, PLEASE CHECK AGAIN</div>
            </form>

            <script type="text/javascript">
            function resetpass()
            {
              if(document.getElementById("test123").value.length > 0 && document.getElementById("text-6bc1").value.length > 0 )
                {
                  if (document.getElementById('test123').value ==
                    document.getElementById('text-6bc1').value) 
                    {
                      document.getElementById("pr_form").submit();
            
                    }
                }
            }

            function checkpasswordconfirm()
            {
              if (document.getElementById('test123').value ==
                    document.getElementById('text-6bc1').value) 
                {
                  document.getElementById("btn_resetpass").disabled=false;
                } 
                else 
                {
                  document.getElementById("btn_resetpass").disabled=true;
                  var x = document.getElementById("snackbar");
                  x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);         
                }
            }

            function seeresetpassword()
              {
                  var x = document.getElementById("test123");
                  if (x.type === "password") 
                  {
                    x.type = "text";
                  } 
                  else 
                  {
                    x.type = "password";
                  }
              }

              function seeresetcpassword()
              {
                  var x = document.getElementById("text-6bc1");
                  if (x.type === "password") 
                  {
                    x.type = "text";
                  } 
                  else 
                  {
                    x.type = "password";
                  }
              }</script>
          </div>
        
      </div>
</section>








<!---footer--------------------------------------------------->
<section class="footer">
    <div class="container text-center">
        <p>Copyright &copy; 2021 HTML. Designed By <a href="#">Izzat Rahimi</a></p>
    </div>
</section>

<!---JavaScript for toggle Menu------------------------------------------------>

<script>
    var navLinks = document.getElementById("navLinks");
    function showMenu(){
      navLinks.style.right = "0";
    }
    function hideMenu(){
      navLinks.style.right = "-200px";
    }
</script>

<script>
    document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
    });
</script>

</body>

</html>
