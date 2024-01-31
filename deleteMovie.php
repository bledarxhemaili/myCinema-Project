<?php
$id = $_GET['id'];

include_once 'repository/movieRepository.php';

$movieRepository = new MovieRepository();

$movieRepository->deleteMovie($id)
?>
