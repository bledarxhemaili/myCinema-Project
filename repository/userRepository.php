<?php 
include_once 'database/databaseConnection.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }


    function insertUser($user){

        $conn = $this->connection;

        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $number = $user->getNumber();
        $password = $user->getPassword();
        $admin = $user->getAdmin();


        $sql = "INSERT INTO login (firstname, lastname, username, email, number, password, admin) VALUES (?,?,?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$firstname, $lastname, $username, $email, $number , $password, $admin]);

        echo "<script> alert('User has been inserted successfuly!'); </script>";

    }

  

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM login";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM login WHERE id='$id'";

        $statement = $conn->query($sql);
        $user = $statement->fetch();

        return $user;
    }

    function updateUser($id,$name,$surname,$email,$username,$password){
         $conn = $this->connection;

         $sql = "UPDATE login SET firstname=?, lastname=?, username=?, email=?, number=?, password=?, admin=?, WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$firstname, $lastname, $username, $email, $number , $password, $admin]);

         echo "<script>alert('update was successful'); </script>";
    } 

    function deleteUser($id){
        $conn = $this->connection;

        $sql = "DELETE FROM login WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        echo "<script>alert('delete was successful'); </script>";
   } 
}

?>