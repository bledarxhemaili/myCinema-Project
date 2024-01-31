
<?php
$id = $_GET['id'];

include_once 'repository/movieRepository.php';

$movieRepository = new MovieRepository();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Edit Booking</h3>
    <form action="" method="post">
    <?php
    
    $movies = $movieRepository->getMovieById($id);
    
    foreach ($movies as $movie) {
    ?>
        <input type="text" name="id" value="<?=$movie['id']?>" readonly> <br> <br>
        <input type="text" name="name" value="<?=$movie['name']?>"><br><br>
        <textarea type="text" name="pershkrimi" rows="6" cols="25"><?=$movie['pershkrimi']?></textarea><br><br>
        <input type="text" name="category" value="<?=$movie['category']?>"><br><br>
        <input type="file" name="image" value="<?=$movie['image']?>"><br><br>
        <input type="text" name="qmimi" value="<?=$movie['qmimi']?>"><br><br>
    <?php
    }
    ?>
    <button type="submit" name="editBtn" class="watch-btn">Ruaj</button>
</form>
</body>
</html>

<?php 
if (isset($_POST['editBtn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $pershkrimi = $_POST['pershkrimi'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    $qmimi = $_POST['qmimi'];
    $movieRepository->updateMovie($id, $name, $pershkrimi, $category, $image, $qmimi);
}


?>