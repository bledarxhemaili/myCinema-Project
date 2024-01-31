<?php 
include_once 'database/databaseConnection.php';

class CommentRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }


    function insertComments($comment){

        $conn = $this->connection;

        $movie_id = $comment->getMovie_id();
        $user_id = $comment->getUser_id();
        $username = $comment->getUsername();
        $review = $comment->getReview();



        $sql = "INSERT INTO comments ( movie_id, user_id, username, review) VALUES (?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$movie_id, $user_id, $username, $review]);

        header("Location: details.php?id=$movie_id");

    }


    function getAllComments(){
        $conn = $this->connection;

        $sql = "SELECT * FROM comments";

        $statement = $conn->query($sql);
        $comments = $statement->fetchAll();

        return $comments;
    }

    function getCommentById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM comments WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $comments = $statement->fetchAll();

        return $comments;
    }


    function getCommentByMovieId($movie_id){
        $conn = $this->connection;

        $sql = "SELECT * FROM comments WHERE movie_id=:movie_id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':movie_id', $movie_id);
        $statement->execute();
        $commenti = $statement->fetchAll();


        return $commenti;
    }


    function updateComment($id, $user_id, $movie_id, $username, $review){
         $conn = $this->connection;

         $sql = "UPDATE comments SET user_id=?, movie_id=?, username=?, review=? WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$user_id, $movie_id, $username, $review, $id]);

         header("Location: dashboard.php");
    } 

    function deleteComment($id){
        $conn = $this->connection;

        $sql = "DELETE FROM comments WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        header("Location: dashboard.php");
   } 
}

?>