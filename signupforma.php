<!DOCTYPE html>
<html lang="zxx">

<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
        body{
            color: white;
        }
    </style>
</head>

<body>
<?php include('header.php'); ?>


    <section>
        <div class="container" style="display: flex; justify-content: center; align-items: center; height: 87vh">
            <div class="col-lg-12"  style="display: flex; justify-content: center; align-items: center;">
                <div class="login-container" style="width: 350px;">
                    <h2>Sign Up</h2>
                    <p style="color: black;">Welcome to the official myCinema website.</p>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validateForm();">
                    <div class="form-group">
                        <input type="text" name="firstname" id="firstname" placeholder="First name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" id="lastname" placeholder="Last name"  required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="number" id="number" placeholder="Phone number"  required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                    <button type="submit" name="submit"  id="button" >Register Now</button>
                </div>
                </form>
                
            </div>
            </div>  
        </div>
    </section>
    <?php include_once 'controller/registerController.php';?>

    <script>
        function validateForm() {
     var firstname = document.getElementById("firstname").value;
     var lastname = document.getElementById("lastname").value;
     var username = document.getElementById("username").value;
     var email = document.getElementById("email").value;
     var phoneNumber = document.getElementById("number").value;
     var password = document.getElementById("password").value;

     var firstnameRegex = /^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/;
     if(!firstnameRegex.test(firstname)){
        alert("Please enter a valid firstname");
        return false;
     }
     var lastnameRegex = /^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/;
     if(!lastnameRegex.test(lastname)){
        alert("Please enter a valid lastname");
        return false;
     }
     var usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
     if(!usernameRegex.test(username)){
        alert("Please enter a valid username");
        return false;
     }
     var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
     if(!emailRegex.test(email)){
        alert("Please enter a valid email");
        return false;
     }
     var phoneNumberRegex = /^(?:\+\d{1,2}\s?)?(?:\d{3})(?:\d{6})$/;
    if (!phoneNumberRegex.test(phoneNumber)) {
        alert("Please enter a valid phone number (like: 044111222)");
        return false;
    }
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*()_+{}|:"<>?`~-=\\[\];',./]{8,}$/;
    if (!passwordRegex.test(password)) {
        alert("Please enter a valid password. \nIt must contain at least: \nAt least one lowercase letter, \nAt least one uppercase letter, \nAt least one digit, \nMust be at least 8 characters long.");
        return false;
    }


  return true;
}

  document.getElementById('button').addEventListener('click', validateForm);
    </script>

    <?php include('footer.php'); ?>

</body>

</html>
