<?php
include_once 'repository/movieRepository.php';
include_once 'models/movies.php';

if(isset($_POST['submit'])){
    if(empty($_POST['name']) || empty($_POST['pershkrimi']) || empty($_POST['category']) || empty($_POST['image']) || empty($_POST['qmimi'])){
        echo "Fill all fields!";
    }else{
        $name = $_POST['name'];
        $pershkrimi = $_POST['pershkrimi'];
        $category = $_POST['category'];
        $image = $_POST['image'];
        $qmimi = $_POST['qmimi'];


        $movie  = new Movie($name, $pershkrimi, $category, $image, $qmimi);
        $movieRepository = new MovieRepository();

        $movieRepository->insertMovie($movie);


    }
}

?>
