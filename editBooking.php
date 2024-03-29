<?php
    $id = $_GET['id'];

    include_once 'repository/bookingRepository.php';

    $bookingRepository = new BookingRepository();
?>
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
        
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            align-items: center;
            align-content: center;
        }

        .form-group label {
            display: flex;
            flex: 1;
            margin: 0;
            color: white;
            align-items: center;
            width: 270px;
            
        }

        .form-group input {
            flex: 2;
        }
    </style>
</head>
<body>

    <div class="container" >
        <div class="row">
            <?php
                $bookings = $bookingRepository->getBookingById($id);
                foreach ($bookings as $booking) {
            ?>
            <div class="col-lg-12 " style="display: flex; justify-content: center; align-items: center; align-content: center;">
            
                <form method="POST" action="" id="forma">             
                    <h1>Forma per ndryshimin e rezervimeve ne databaz</h1>

                    <div class="form-group">
                        <label for="id">ID: </label>
                        <input type="text" name="id" value="<?=$booking['id']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="movie_id">Movie id:</label>
                        <input type="number" name="movie_id" value="<?=$booking['movie_id']?>">
                    </div>
                    <div class="form-group">
                        <label for="user_id">User id: </label>
                        <input type="number" name="user_id" value="<?=$booking['user_id']?>">
                    </div>
                    <div class="form-group">
                        <label for="s_numbers">Number of tickets:</label>
                        <input type="number" name="s_numbers" value="<?=$booking['s_numbers']?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label> 
                        <input type="text" name="date" value="<?=$booking['date']?>">
                    </div>
                    <div class="form-group">
                       <label for="time">Time:</label>
                       <input type="text" name="time" value="<?=$booking['time']?>">
                    </div>
                    <div class="form-group">
                        <label for="totali">Totali:</label>
                        <input type="text" name="totali" value="<?=$booking['totali']?>">
                    </div>
                    
                    <br>

                    <button type="submit" name="submit" class="watch-btn">Ruaj</button>
                </form>
                
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    <?php 
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $movie_id = $_POST['movie_id'];
            $user_id = $_POST['user_id'];
            $s_numbers = $_POST['s_numbers'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $totali = $_POST['totali'];
            $bookingRepository->updateBooking($id, $movie_id, $user_id, $s_numbers, $date, $time , $totali);
        }
    ?>
    
</body>
</html>
