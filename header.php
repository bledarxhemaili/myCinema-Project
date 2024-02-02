<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<?php 
include_once 'repository/userRepository.php';
?>
<header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                        <a href="./index.php"><img src="images/logo.png" alt="" class="logo"></a>
                </div>           
                <div class="col-lg-8" style="display: flex; justify-content: flex-end ; align-items: center;">
                            <ul id="buttons">
                                <li><a href="./index.php">Homepage</a></li>
                                <li><a href="./contactUs.php">Contact Us</a></li>
                                <li><a href="./aboutUs.php">About Us</a></li>
                                <li><a href="./signupforma.php">Sign Up</a></li>
                                <li><a href="./login.php">Log In</a></li>
                            </ul>     
                </div>
                <div class="col-lg-2" style="display: flex; justify-content: flex-end ; align-items: center;">
                        <?php
                            if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
                                $image='<a href="./dashboard.php"><img src="images/user.png" style="margin-right: 20px;"/></a>';
                                $image1='<a href="./logout.php"><img src="images/logout.png"/></a>';
                                echo $image;
                                echo $image1;
                            }
                        ?>

                </div> 
            </div>
        </div>
    </header>