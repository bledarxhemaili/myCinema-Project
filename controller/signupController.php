<?php

// session_start();
include_once 'repository/userRepository.php';
include_once 'models/user.php';

if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo "Fill all fields!";
    }else{
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userRepository = new UserRepository();
        $userRepository->loginUser($username, $password);

    }
}

?>