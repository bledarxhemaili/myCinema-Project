<?php 
include_once 'database/databaseConnection.php';

class MovieRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }


    function insertMovie($movie){

        $conn = $this->connection;

        $name = $movie->getName();
        $pershkrimi = $movie->getPershkrimi();
        $category = $movie->getCategory();
        $image = $movie->getImage();
        $qmimi = $movie->getQmimi();




        $sql = "INSERT INTO movies (name, pershkrimi, category, image, qmimi) VALUES (?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$name, $pershkrimi, $category, $image, $qmimi]);

        echo "<script> alert('Movies has been inserted successfuly!'); </script>";
        header("Location: dashboard.php");
        
    }



    function getAllMovies(){
        $conn = $this->connection;

        $sql = "SELECT * FROM movies ORDER BY id DESC ";

        $statement = $conn->query($sql);
        $movies = $statement->fetchAll();

        return $movies;
    }

    function getMovieById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM movies WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $movies = $statement->fetchAll();

 
        return $movies;
    }



    function updateMovie($id, $name, $pershkrimi, $category, $image, $qmimi) {
        $conn = $this->connection;

        $sql = "UPDATE movies SET name=?, pershkrimi=?, category=?, image=?, qmimi=? WHERE id=?";
        $statement = $conn->prepare($sql);

        $statement->execute([$name, $pershkrimi, $category, $image, $qmimi, $id]);

        header("location:dashboard.php");
    }

    function deleteMovie($id){
        $conn = $this->connection;

        $sql = "DELETE FROM movies WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        header("location:dashboard.php");
   } 
}


?>