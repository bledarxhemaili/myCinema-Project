<?php
    $host = 'localhost';
    $username = 'root';
    $db = 'mycinema';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host; dbname=$db" , $username , $password); 
        array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION);

        // echo "Sukses";

    }catch(Exception $e){
        echo "Dicka shkoi keq";
    }
?>