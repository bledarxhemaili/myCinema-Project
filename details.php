<?php

    // session_start();

    $movie_id = $_GET['id'];

    $_SESSION['movie_id'] = $movie_id;


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
html, body{
  width:100%; 
  height:100%;
  padding:0px;
  margin:0px;
}
    </style>
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


<div id="divi">
    <div class="container" >

    <?php
        include_once('config.php');
        $id = $_GET['id'];

        $sql = "SELECT * FROM movies WHERE id=:id";
        $prep = $conn->prepare($sql);
        $prep->bindParam(':id', $id);
        $prep->execute();
        $date = $prep->fetchAll();
        ?>

                      <?php foreach ($date as $data) {?>
        <div class="col-lg-12">
            <h2 id="titulli"><?php echo $data['name']; ?></h2>

        </div>
      <div class="row" style="display: flex; justify-content: center; align-items: center;">
        <div class="col-lg-2">
            <ol>
                <li><span>Category: </span><?php echo $data['category']; ?></li>
                <li><span>Quality: </span> UHD</li>
                <li><span>Views: </span><?php echo(rand(100,9999)); ?></li>
                <li><span>Price: </span> 4.80€</li>
            </ol>
        </div>
        <div class="col-lg-6">
            <p><?php echo $data['pershkrimi']; ?></p>
        </div>
       
        <div class="col-lg-4">
            <img src="images/<?php echo $data['image']; ?>" alt="" style="width: 100%;">
        </div>
      </div>

    
      <?php } ?>

    </div>
</div>

    <footer class="footer1">
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
</html>