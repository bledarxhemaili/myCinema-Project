<?php
    $id = $_GET['id'];

    include_once 'repository/commentRepository.php';

    $commentRepository = new CommentRepository();
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
    </style>
</head>
<body>

    <div class="container" >
        <div class="row">
            <?php
                $comments = $commentRepository->getCommentById($id);
                foreach ($comments as $comment) {
            ?>
            <div class="col-lg-12 " style="display: flex; justify-content: center; align-items: center; align-content: center;">
            
                <form method="POST" action="" id="forma">             
                    <h1>Forma per ndryshimin e komenteve ne databaz</h1>

                    <input type="text" name="id" value="<?=$comment['id']?>" readonly> <br> <br>
                    <input type="number" name="movie_id" value="<?=$comment['movie_id']?>" ><br><br>
                    <input type="number" name="user_id" value="<?=$comment['user_id']?>" ><br><br>
                    <input type="text" name="username" value="<?=$comment['username']?>" ><br><br>
                    <input type="text" name="review" value="<?=$comment['review']?>"><br><br>

                    <button type="submit" name="submit" class="watch-btn">Ruaj</button>

                </form>
                
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    <?php 
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $movie_id = $_POST['movie_id'];
            $user_id = $_POST['user_id'];
            $username = $_POST['username'];
            $review = $_POST['review'];
            $commentRepository->updateComment($id, $user_id, $movie_id, $username, $review);
        }
    ?>
    
</body>
</html>
