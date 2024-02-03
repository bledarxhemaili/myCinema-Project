<!DOCTYPE html>
<html lang="en">
<head>
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
        #forma{
            margin-top: 10%;
        }
    </style>
</head>
<body>

    <div class="container" >
        <div class="row">
            <div class="col-lg-12 " style="display: flex; justify-content: center; align-items: center; align-content: center;">           
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" id="forma">             
                    <h1>Forma per shtimin e perdoruesve ne databaz</h1>

                    <input type="text" name="firstname" placeholder="First name"><br><br>
                    <input type="text" name="lastname" placeholder="Last name" ><br><br>
                    <input type="text" name="username" placeholder="Username"><br><br>
                    <input type="email" name="email" placeholder="Email address"><br><br>
                    <input type="tel" name="number" placeholder="Phone number" ><br><br>
                    <input type="password" name="password" placeholder="Password"><br><br>

                    <button type="submit" name="submit" class="watch-btn">Shto</button>
                </form>
                <?php include_once 'controller/registerController.php';?>
            </div>
        </div>
    </div>

</body>
</html>
