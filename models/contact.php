<?php

class Contact{
    private $name;
    private $email;
    private $message;



    function __construct($name, $email, $message){
            $this->name = $name;
            $this->email = $email;
            $this->message = $message;

    }

    function getName(){
        return $this->name;
    }
    function getEmail(){
        return $this->email;
    }
    function getMessage(){
        return $this->message;
    }
}

?>