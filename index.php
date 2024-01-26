<!DOCTYPE html>
<html lang="en">
<head>
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

<div class="container" style="display: flex; justify-content: center; height: 600px; margin-top: 40px; max-width: 80%;">
   <div class="col-md-2  forma"><button type="button" onclick="displayPreviousImage()" class=" btn_prev_next">Previous</button></div>
    <div class="col-md-10">
        <img id="img" src="images/07.png" >
        <!-- <button type="button" onclick="displayPreviousImage()">Previous</button>
        <button type="button" onclick="displayNextImage()">Next</button> -->
    </div>
    <div class="col-md-2 forma"><button type="button" onclick="displayNextImage()" class=" btn_prev_next">Next</button></div>

</div>
          <script type = "text/javascript">
            function displayNextImage() {
                x = (x === images.length - 1) ? 0 : x + 1;
                document.getElementById("img").src = images[x];
            }
  
            function displayPreviousImage() {
                x = (x <= 0) ? images.length - 1 : x - 1;
                document.getElementById("img").src = images[x];
            }
  
    
            setInterval(displayNextImage, 10000);
            
  
            var images = [], x = -1;
            images[0] = "images/cred3.png";
            images[1] = "images/fastx.png";
            images[2] = "images/black.png";
            images[3] = "images/la.png";
            images[4] = "images/prison.png";
            images[5] = "images/meg2.png";
            images[6] = "images/peaky.png";
            images[7] = "images/breaking.png";
            images[8] = "images/07.png";
        </script>


        <?php
        include_once('config.php');
        $sql = "SELECT * FROM movies ORDER BY id DESC ";
        $prep = $conn->prepare($sql);
        $prep->execute();
        $datas = $prep->fetchAll();
        ?>

        <div class="container" style="max-width: 80%; margin-top: 2%;">
            <div class="row" >
            <?php
                foreach ($datas as $data) {   ?>

            <div class="col-xl-4">
                <img src="images/<?php echo $data['image']; ?>" alt="" class="img">
                <div class="views_date">
                    <h6><a href="./details.php?id=<?= $data['id']; ?>"  style=" color: white; text-decoration: none; font-size: 1.2rem;" ><?= $data["name"]; ?></a></h6>
                    <p class="category"><?php echo $data['category']; ?></p>
                </div>
            </div>
            <?php  }  ?>
         </div>
        </div>
    

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
</html>