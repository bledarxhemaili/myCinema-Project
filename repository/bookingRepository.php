<?php 
include_once 'database/databaseConnection.php';

class BookingRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }


    function insertBooking($booking){

        $conn = $this->connection;

        $movie_id = $booking->getMovie_id();
        $user_id = $booking->getUser_id();
        $s_numbers = $booking->getS_numbers();
        $date = $booking->getDate();
        $time = $booking->getTime();
        $totali = $booking->getTotali();



        $sql = "INSERT INTO booking (movie_id, user_id, s_numbers, date, time, totali) VALUES (?,?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$movie_id, $user_id, $s_numbers, $date, $time , $totali]);

        $booking_id = $conn->lastInsertId();

        header("Location: payment.php?id=$booking_id");
    }


    function getAllBooking(){
        $conn = $this->connection;

        $sql = "SELECT * FROM booking";

        $statement = $conn->query($sql);
        $bookings = $statement->fetchAll();

        return $bookings;
    }

    function getBookingById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM booking WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $bookings = $statement->fetchAll();

        return $bookings;

    }

    function updateBooking($id, $movie_id, $user_id, $s_numbers, $date, $time , $totali){
         $conn = $this->connection;

         $sql = "UPDATE booking SET movie_id=?, user_id=?, s_numbers=?, date=?, time=?, totali=? WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$movie_id, $user_id, $s_numbers, $date, $time , $totali, $id]);

         header("Location: dashboard.php");
    } 

    function deleteBooking($id){
        $conn = $this->connection;

        $sql = "DELETE FROM booking WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        header("Location: dashboard.php");
   } 
}

?>