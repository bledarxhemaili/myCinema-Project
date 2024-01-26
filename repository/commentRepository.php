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
    exit();

        // $sql = "INSERT INTO comments(user_id, movie_id, username, review) VALUES (:user_id, :movie_id, :username, :review)";
        // $newComment = $conn->prepare($sql);
        // $newComment->bindParam(':user_id', $user_id);
        // $newComment->bindParam(':movie_id', $movie_id);
        // $newComment->bindParam(':user', $user);
        // $newComment->bindParam(':review', $review);

        // $newComment->execute();

        // echo "<script> alert('Comment has been inserted successfuly!'); </script>";
        // header("Location: details.php?id=$movie_id");

        // return ("Location: details.php?id=$movie_id");

    }


    function getAllComments(){
        $conn = $this->connection;

        $sql = "SELECT * FROM comments";

        $statement = $conn->query($sql);
        $comments = $statement->fetchAll();

        return $comments;
    }

    function getCommentById($comment_id){
        $conn = $this->connection;

        $sql = "SELECT * FROM comments WHERE comment_id='$comment_id'";

        $statement = $conn->query($sql);
        $comment = $statement->fetch();

        return $comment;
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


    function updateComment($comment_id, $user_id, $movie_id, $username, $review){
         $conn = $this->connection;

         $sql = "UPDATE comments SET user_id=?, movie_id=?, username=?, review=? WHERE comment_id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$user_id, $movie_id, $username, $review]);

         echo "<script>alert('update was successful'); </script>";
    } 

    function deleteComment($comment_id){
        $conn = $this->connection;

        $sql = "DELETE FROM comments WHERE comment_id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$comment_id]);

        echo "<script>alert('delete was successful'); </script>";
   } 
}

?>