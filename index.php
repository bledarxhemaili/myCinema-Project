<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include('header.php'); ?>


<div class="container" style="display: flex; justify-content: center; height: 600px; margin-top: 40px; max-width: 80%;">
   <div class="col-md-2  forma"><button type="button" onclick="displayPreviousImage()" class=" btn_prev_next">Previous</button></div>
    <div class="col-md-10">
        <img id="img" src="images/07.png" >
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


    include_once 'repository/movieRepository.php';

    $movieRepository = new MovieRepository();

    $movies = $movieRepository->getAllMovies();


  
        echo "<div class='container' style='max-width: 80%; margin-top: 2%;'>";
        echo "<div class='row'>";
        
        foreach ($movies as $movie) {
            echo "
                <div class='col-xl-4'>
                    <img src='images/{$movie['image']}' alt='Foto' class='img'>
                    <div class='views_date'>
                        <h6><a href='./details.php?id={$movie['id']}' style='color: white; text-decoration: none; font-size: 1.2rem;'>{$movie['name']}</a></h6>
                        <p class='category'>{$movie['category']}</p>
                    </div>
                </div>
            ";
        }
        
        echo "</div>";
        echo "</div>";
     ?>


          <?php include('footer.php'); ?> 
</body>
</html>