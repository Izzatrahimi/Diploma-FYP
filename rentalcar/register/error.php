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
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>

    <p class="tip"></p>
    <div class="cont">
      <form method = "POST" action = "process.php">
        <div class="form sign-in">
            <h2>Wrong Username or Password
                <br>Please re-enter your details
            </h2>
            <label>
                <span>Username</span>
                <input type="text" name = "username" id = "username" required>
            </label>
            <label>
                <span>Password</span>
                <input type="password" name = "password" id = "password" required>
            </label>
            <button type="submit" class="submit" name ="login">Sign In</button>
        </div>
      </form>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                </div>
                <div class="img__text m--in">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
          <form method = "POST" action="db_add_user.php">
            <div class="form sign-up">
                <h2>Register</h2>
                <label>
                    <span>Username</span>
                    <input type="text" name = "username" id = "username">
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name = "password" id = "password">
                </label>
                 <label>
                    <span>Name</span>
                    <input type="text" name = "name" id = "name">
                </label>
                <label>
                    <span>Address</span>
                    <input type="text" name = "address" id = "address">
                </label>
                <label>
                    <span>Phone Number</span>
                    <input type="text" name = "telephone" id = "telephone" placeholder = "Example: 01X-XXXXXXX" pattern="[0-9]{3}-[0-9]{7}" required>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name = "email" id = "email">
                </label>
                <label>
                    <input type="hidden" name="level_id" value="2">
                </label>
                <table>
                    <tr>
                        <td style = "padding: 14px;"><button type="submit" class="submit" name ="login">Sign Up</button></td>
                        <td style = "padding: 14px;"><button type="reset" class="submit" name ="login">Reset</button></td>
                    </tr>
                </table>
            </div>
          </form>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
</body>

</html>
