<?php 
include_once 'database/databaseConnection.php';

class DashboardRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }

    function getData(){
        $conn = $this->connection;


        if($_SESSION['admin'] == 'false'){
  
            $user_id = $_SESSION['user_id'];
  
            $sql = "SELECT  movies.name, login.username, booking.s_numbers, booking.date, booking.time, booking.totali
            FROM login INNER JOIN booking ON login.id=booking.user_id INNER JOIN movies ON movies.id=booking.movie_id
            WHERE booking.user_id = :user_id";
  
           $prep = $conn->prepare($sql);
           $prep->bindParam(':user_id',$user_id);
           $prep->execute();
           $datas = $prep->fetchAll();
       }

       return $datas;
    }

    function getComments(){
        $conn = $this->connection;

        if($_SESSION['admin'] == 'false'){

            $user_id = $_SESSION['user_id'];

            $sql = "SELECT  movies.name, comments.review
            FROM login INNER JOIN comments ON login.username=comments.username INNER JOIN movies ON movies.id=comments.movie_id
            WHERE comments.user_id = :user_id";

            $prep = $conn->prepare($sql);
            $prep->bindParam(':user_id',$user_id);
            $prep->execute();
            $comments = $prep->fetchAll();
        }

        return $comments;
    }
 
}

?>