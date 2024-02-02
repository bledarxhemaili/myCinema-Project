<?php

      session_start();


      $movie_id = $_GET['id'];

      $user_id = $_SESSION['user_id'];

      $_SESSION['movie_id'] = $movie_id;
  
      $id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include('header.php'); ?>


<?php

include_once 'repository/movieRepository.php';

$movieRepository = new MovieRepository();

$movies = $movieRepository->getMovieById($id);

foreach ($movies as $movie) {
  ?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="container"  style="display: flex; align-items: center; justify-content: center; margin-top: 5%;">
  <div class="row">
    <div class="col-lg-12" style="display: flex; align-items: center; justify-content: center; ">
      <h3><?= $movie["name"]; ?></h3>  
    </div>
    <div class="col-lg-3"></div>
    <div class="col-lg-6" style="display: flex; align-items: center; justify-content: center;">
      <img src="images/<?php echo $movie['image']; ?>" alt="Foto" style="width: 600px;">
    </div>
  </div>

</div>

<div class="container" id="booking">
            
              <div class="col-lg-6 text-center" style="color: white; margin-top: 2%;">
                <h2>Book your ticket</h2>
                    <p>Choose the date, time and number of seats</p>
              </div>
              <div class="col-md-6">
                <input class="form-control nr" type="number" name="s_numbers" placeholder="Number of seats" min="1" id="seatNr">
              </div>

      <div class="rresht">
          <div class="b2">
           <div class="form-label">
             <select class="b1"  name="date" value="Date">
          <option value="" disabled selected hidden>Date</option>
           <option>01.12.2023</option>
           <option>02.12.2023</option>
           <option>03.12.2023</option>
           <option>04.12.2023</option>
           <option>05.12.2021</option>
           <option>06.12.2023</option>
           <option>07.12.2023</option>
           <option>08.12.2023</option>
           <option>09.12.2023</option>

         </select>
         </div>
       </div>

       <div class="b2">
        <div class="form-label">
          <select class="b1"  name="time" placeholder="Time">
            <option value="" disabled selected hidden>Time</option>
        <option>10:10</option>
        <option>11:15</option>
        <option>12:20</option>
        <option>13:25</option>
        <option>14:30</option>
        <option>15:35</option>
        <option>16:40</option>
        <option>17:45</option>
        <option>18:50</option>
        <option>19:55</option>

      </select>
      </div>
    </div>


  </div>
  <div class="rresht">
    <h5><span>Price for one seat: </span><?php echo $movie['qmimi']; ?> €</h5>
  </div>
      <input type="hidden" value="<?php echo $movie_id ?>" name="movie_id" />
      <input type="hidden" value="<?php echo $user_id ?>" name="user_id" />
      <input type="hidden" value="<?php echo $movie['qmimi']; ?>" name="qmimi" />

    <div class="row-lg-12">
        <button class="submit-btn" type="submit" name="submit" >Book Now</button>
    </div>
  
</div>

</form>
  <?php
}
?>
<?php include_once 'controller/bookingController.php';?>


<?php include('footer.php'); ?>
</body>
</html>