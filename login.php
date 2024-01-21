<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                        <a href="./index.php"><img src="images/logo.png" alt="" class="logo"></a>
                </div>           
                <div class="col-lg-10" style="display: flex; justify-content: flex-end ; align-items: center;">
                            <ul id="buttons">
                                <li><a href="./index.php">Homepage</a></li>
                                <li><a href="./signupforma.php">Sign Up</a></li>
                                <li><a href="./login.php">Log In</a></li>
                            </ul>     
                </div>
            </div>
        </div>
    </header>

<div class="container" style="display: flex; justify-content: center; align-items: center; height: 87vh;">
    <div class="col-lg-12"  style="display: flex; justify-content: center; align-items: center;">
    <div class="login-container">
        <h2>Log In</h2>
        <p style="color: black;">Welcome to the official myCinema website.</p>
        <form id="loginForm">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit"  id="button">Login</button>
            </div>
        </form>
    </div>
</div>
</div>
     <script>
        function validateForm() {
     var username = document.getElementById("username").value;
     var password = document.getElementById("password").value;


     var usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
     if(!usernameRegex.test(username)){
        alert("Please enter a valid username");
        return false;
     }
     var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
     if(!passwordRegex.test(password)){
        alert("Please enter a valid password");
        return false;
     }
  return true;
}
  document.getElementById('button').addEventListener('click', validateForm);
    </script>


<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                    <a href="./index.html"><img src="images/logo.png" alt="" class="logo"></a>
            </div>
            <div class="col-lg-6" style="display: flex; align-items: center; justify-content: center;">
                    <ul id="buttons">
                        <li><a href="./index.html">Homepage</a></li>
                        <li><a href="./signupforma.html">Sign Up</a></li>
                        <li><a href="./login.html">Log In</a></li>
                    </ul>
            </div>
            <div class="col-lg-3" style="display: flex; align-items: center; justify-content: center;">
                <p style="margin: 0;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
            </div>
          </div>
      </div>
  </footer>
</body>