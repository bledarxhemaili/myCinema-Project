

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
    <?php include('header.php'); ?>

<div class="container" style="display: flex; justify-content: center; align-items: center; height: 87vh;">
    <div class="col-lg-12"  style="display: flex; justify-content: center; align-items: center;">
    <div class="login-container">
        <h2>Log In</h2>
        <p style="color: black;">Welcome to the official myCinema website.</p>
        <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="login">
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

<?php include_once 'controller/signupController.php';?>

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


    <?php include('footer.php'); ?>

</body>