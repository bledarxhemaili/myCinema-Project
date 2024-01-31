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

        header("Location: index.php");

    }

    function loginUser($username, $password){

        $conn = $this->connection;
        
        $sql = "SELECT id, username, password, admin FROM login WHERE username =:username";
        $prep = $conn->prepare($sql);
        $prep->bindParam(":username", $username);
        $prep->execute();
        $data = $prep->fetch();


            if($data == false){
                echo "<script>alert('Username incorrect!')</script>";
                 echo "<script>location.href='login.php'</script>";
            }else if(password_verify($password, $data['password'])){
                session_start();
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['password'] = $data['password']; 
                $_SESSION['admin'] = $data['admin'];
                header("Location: index.php");
            }else{
                echo "<script>alert('Password incorrect!')</script>";
                 echo "<script>location.href='login.php'</script>";
            }

        if ($username == $username && $password == $password) { 
        $_SESSION['authenticated'] = true;
        header("Location: index.php");
        }


        return $data;

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

        $sql = "SELECT * FROM login WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $users = $statement->fetchAll();

        return $users;
    }

    function updateUser($id, $firstname, $lastname, $username, $email, $number, $password, $admin){
         $conn = $this->connection;

         $sql = "UPDATE login SET firstname=?, lastname=?, username=?, email=?, number=?, password=?, admin=? WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$firstname, $lastname, $username, $email, $number , $password, $admin, $id]);

         header("location:dashboard.php");
    } 
    
    function deleteUser($id){
        $conn = $this->connection;

        $sql = "DELETE FROM login WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        header("location:dashboard.php");
   } 
}

?>