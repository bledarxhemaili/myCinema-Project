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
                <form method="POST" action="" id="forma">             
                    <h1>Forma per shtimin e rezervimeve ne databaz</h1>

                    <input type="number" name="movie_id" placeholder="Movie id"><br><br>
                    <input type="number" name="user_id" placeholder="User id" ><br><br>
                    <input type="number" name="s_numbers" placeholder="Tickets numbers" ><br><br>
                    <input type="date" name="date" placeholder="Date"><br><br>
                    <input type="text" name="time" placeholder="Time"><br><br>
                    <input type="text" name="totali" placeholder="Totali"><br><br>

                    <button type="submit" name="submit" class="watch-btn">Shto</button>
                </form>

            </div>
        </div>
    </div>
    <?php 
        include_once 'repository/bookingRepository.php';
        include_once 'models/booking.php';

        if (isset($_POST['submit'])) {
            $movie_id = $_POST['movie_id'];
            $user_id = $_POST['user_id'];
            $s_numbers = $_POST['s_numbers'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $totali = $_POST['totali'];

            $booking  = new Booking($movie_id, $user_id, $s_numbers, $date, $time, $totali);
            $bookingRepository = new BookingRepository();

            $bookingRepository->insertBooking($booking);
        }
    ?>
</body>
</html>
