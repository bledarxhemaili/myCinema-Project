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



        $sql = "INSERT INTO movies (name, pershkrimi, category, image) VALUES (?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$name, $pershkrimi, $category, $image]);

        echo "<script> alert('Movies has been inserted successfuly!'); </script>";
        
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

    function updateMovie($name, $pershkrimi, $category, $image){
         $conn = $this->connection;

         $sql = "UPDATE movies SET name=?, pershkrimi=?, category=?, image=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$name, $pershkrimi, $category, $image]);

         echo "<script>alert('update was successful'); </script>";
    } 

    function deleteMovie($id){
        $conn = $this->connection;

        $sql = "DELETE FROM movies WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        echo "<script>alert('delete was successful'); </script>";
   } 
}


?>