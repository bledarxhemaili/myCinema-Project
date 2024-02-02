
<?php
$id = $_GET['id'];

include_once 'repository/movieRepository.php';

$movieRepository = new MovieRepository();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
         #forma{
            margin-top: 10%;
        }
         .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            align-items: center;
            align-content: center;
        }

        .form-group label {
            display: flex;
            flex: 1;
            margin: 0;
            color: white;
            align-items: center;
            width: 110px;
            
        }

        .form-group input {
            flex: 2;
        }
    </style>
</head>
<body>
<div class="container" >
    <div class="row">
    <?php
        $movies = $movieRepository->getMovieById($id);
        foreach ($movies as $movie) {
    ?>
        <div class="col-lg-12 " style="display: flex; justify-content: center; align-items: center; align-content: center;">
            <form method="POST" action="" id="forma">    

                <h1>Forma per ndryshimin e Filmave ne databaz</h1>
                
                <div class="form-group">
                    <label for="id">ID: </label>
                    <input type="text" name="id" value="<?=$movie['id']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" value="<?=$movie['name']?>">
                </div>
                <div class="form-group">
                    <label for="pershkrimi">Pershkrimi:  </label>
                    <textarea type="text" name="pershkrimi" rows="6" cols="25"><?=$movie['pershkrimi']?></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category: </label>
                    <input type="text" name="category" value="<?=$movie['category']?>">
                </div>
                <div class="form-group">
                    <label for="image">Image: </label>
                    <input type="file" name="image" value="<?=$movie['image']?>">
                </div>
                <div class="form-group">
                    <label for="Qmimi">Qmimi: </label>
                    <input type="text" name="qmimi" value="<?=$movie['qmimi']?>">
                </div>
                
                <br>
            
                <button type="submit" name="editBtn" class="watch-btn">Ruaj</button>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
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