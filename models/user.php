<?php

class User{
    private $firstname;
    private $lastname;
    private $username;
    private $email;
    private $number;
    private $password;
    private $admin = "false";


    function __construct($firstname, $lastname, $username, $email, $number,$password, $admin){
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->username = $username;
            $this->email = $email;
            $this->number = $number;
            $this->password = $password;
            $this->admin = $admin;

    }


    function getFirstname(){
        return $this->firstname;
    }
    function getLastname(){
        return $this->lastname;
    }
    function getUsername(){
        return $this->username;
    }
    function getEmail(){
        return $this->email;
    }
    function getNumber(){
        return $this->number;
    }
    function getPassword(){
        return $this->password;
    }
    function getAdmin(){
        return $this->admin;
    }
}

?>
