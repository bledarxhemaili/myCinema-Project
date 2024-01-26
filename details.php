<?php
// include_once 'repository/userRepository.php';
    session_start();

    $movie_id = $_GET['id'];

    // $user_id = $_POST['id'];

    // $username = $_POST['username'];
    // Retrieve values from the session
    // $user_id = $_SESSION['user_id'];
    // $username = $_SESSION['username'];


    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    // $user_id = isset($_GET['id']) ? $_GET['id'] : null;
    // $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
    // $username = isset($_GET['username']) ? $_GET['username'] : null;


    // $_SESSION['user_id'] = $_GET['id'];

    // $_SESSION['username'] = $_GET['username'];

    $_SESSION['movie_id'] = $movie_id;

    
    // $movie_id = $_POST['movie_id'];

    $id = $_GET['id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
/* html, body{
  width:100%; 
  height:100%;
  padding:0px;
  margin:0px;
} */


.review-section {
    /* background-color: #333; */
    /* color: white; */
    padding: 20px;
}

.reviews, .your-comment {
    margin-bottom: 20px;
}

.username {
   font-weight: bold; 
}

textarea {
   width: calc(100% - 20px);
   height: 80px;
   margin-bottom: 10px; 
}

button {
   background-color: red; 
   color:white; 
   border:none; 
   padding:10px 20px; 
}

.booki{
    display: flex;
	justify-content: center;
	align-items: center;
}

.watch-btn{
  background-color: red;
  color: white;
  padding: 15px 25px;
  text-decoration: none;
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



    <?php

   
    include_once 'repository/movieRepository.php';



    $movieRepository = new MovieRepository();

    $movies = $movieRepository->getMovieById($id);

echo "<div class='container' >";

foreach ($movies as $movie) {

echo "<div class='col-lg-12'>
          <h2 id='titulli'>{$movie['name']}</h2>
    </div>
    <div class='row' style='display: flex; justify-content: center; align-items: center;'>
    <div class='col-lg-6'>
                <p>{$movie['pershkrimi']}</p>
                <ol>
                    <li><span>Category: </span>{$movie['category']}</li>
                    <li><span>Quality: </span>UHD</li>
                    <li><span>Views: </span>" . rand(100, 9999) . "</li>
                    <li><span>Price: </span>4.80€</li>
                </ol>
            </div>
        <div class='col-lg-4'>
            <img src='images/{$movie['image']}' alt='' style='width: 100%;'>
        </div>
     </div>
     ";

}

echo "</div>";
  ?>

    

    <div class="container" >
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="review-section">
                    <div class="reviews">
                        <h5>Reviews</h5>
                                    
                        <?php

                include_once 'repository/commentRepository.php';



                $commentRepository = new CommentRepository();

                $commenti = $commentRepository->getCommentByMovieId($movie_id);

                foreach ($commenti as $comment) {
                       echo "
                            <div class='review'>
                                <img src='images/user.png' alt='' style='display:inline;'>
                                <h6 style='display:inline; white-space:nowrap;'>{$comment['username']}</h6>
                                <p>{$comment['review']}</p>
                            </div>
                    "; 
                }
                     ?>
                    </div>

                    <div class="your-comment">
                        <h5>Your Comment</h5>
                        <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $movie_id;?>" method="POST">
                            <textarea placeholder="Your Comment" name="review" style=" font-size: 18px; " ></textarea>
                            <input type="hidden" value="<?php echo $movie_id ?>" name="movie_id" />
                            <input type="hidden" value="<?php echo $user_id ?>" name="user_id" />
                            <input type="hidden" value="<?php echo $username ?>" name="username" />
                            <div style="display: flex; justify-content: center;">
                                <button type="submit" name="submit">Review</button>     
                            </div>    
                        </form>
                    </div>
                </div>
            </div>

            <?php include_once 'controller/commentController.php';?>

            <div class="col-lg-6 col-md-6 booki">
             <a href="./booking.php?id=<?=  $movie_id ?>" class="watch-btn" ><span style="margin-top: 8%;">Book your ticket</span></a>
            </div>
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