<?php
include_once 'repository/userRepository.php';
include_once 'models/user.php';

if(isset($_POST['submit'])){
    if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['username']) ||
    empty($_POST['email']) || empty($_POST['number']) || empty($_POST['password']) ){
        echo "Fill all fields!";
    }else{
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $number = $_POST['number'];;
        $temPASS = $_POST['password'];
        $password = password_hash($temPASS, PASSWORD_DEFAULT);
        $admin = "false";


        $user  = new User($firstname, $lastname, $username, $email, $number,$password, $admin);
        $userRepository = new UserRepository();

        $userRepository->insertUser($user);


    }
}



?>