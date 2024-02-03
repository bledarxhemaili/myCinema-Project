<?php
include_once 'repository/contactRepository.php';
include_once 'models/contact.php';

if(isset($_POST['submit'])){
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])){
        echo "Fill all fields!";
    }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];


        $contact  = new Contact($name, $email, $message);
        $contactRepository = new ContactRepository();

        $contactRepository->insertContact($contact);


    }
}

?>