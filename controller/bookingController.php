<?php
include_once 'repository/bookingRepository.php';
include_once 'models/booking.php';

if(isset($_POST['submit'])){
    if(empty($_POST['movie_id']) || empty($_POST['user_id']) || empty($_POST['s_numbers']) ||
    empty($_POST['date']) || empty($_POST['time']) || empty($_POST['qmimi']) ){
        echo "Fill all fields!";
    }else{
        $movie_id = $_POST['movie_id'];
        $user_id = $_POST['user_id'];
        $s_numbers = $_POST['s_numbers'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $totali = $s_numbers * $_POST['qmimi']; 


        $booking  = new Booking($movie_id, $user_id, $s_numbers, $date, $time, $totali);
        $bookingRepository = new BookingRepository();

        $bookingRepository->insertBooking($booking);


    }


}

?>