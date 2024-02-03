<?php 
include_once 'database/databaseConnection.php';

class ContactRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }


    function insertContact($contact){

        $conn = $this->connection;

        $name = $contact->getName();
        $email = $contact->getEmail();
        $message = $contact->getMessage();


        $sql = "INSERT INTO contact (name, email, message) VALUES (?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$name, $email, $message]);

        header("Location: index.php");

    }


    function getAllContacts(){
        $conn = $this->connection;

        $sql = "SELECT * FROM contact";

        $statement = $conn->query($sql);
        $contacts = $statement->fetchAll();

        return $contacts;
    }

    function getContactById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM contact WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $contacts = $statement->fetchAll();

        return $contacts;
    }



    function updateContact($id, $name, $email, $message){
         $conn = $this->connection;

         $sql = "UPDATE contact SET name=?, email=?, message=? WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$name, $email, $message, $id]);

         header("Location: dashboard.php");
    } 

    function deleteComment($id){
        $conn = $this->connection;

        $sql = "DELETE FROM contact WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        header("Location: dashboard.php");
   } 
}

?>