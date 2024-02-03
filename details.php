<?php

    session_start();
    if ($_SESSION['user_id'] === null || $_SESSION['username']=== null) {
        header("Location: login.php");
        exit();
    }

    if (isset($_GET['id'])) {
        $movie_id = $_GET['id'];
        $_SESSION['movie_id'] = $movie_id;
    
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
    } 
    
    
    include_once 'repository/movieRepository.php';
    include_once 'repository/commentRepository.php';
    
    $movieRepository = new MovieRepository();
    $commentRepository = new CommentRepository();
    
    $movies = $movieRepository->getMovieById($movie_id);
    $commenti = $commentRepository->getCommentByMovieId($movie_id);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
 <style>
    body{

        height: auto;
        margin: 0;
        padding: 0;
        overflow: auto;
    }
 </style>
</head>
<body>
<?php include('header.php'); ?>

<div class="container" style="margin-top: 5%;">
    <?php foreach ($movies as $movie) : ?>
        <div class="col-lg-12">
            <h2 id="titulli"><?= $movie['name'] ?></h2>
        </div>
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-lg-6">
                <p><?= $movie['pershkrimi'] ?></p>
                <ol>
                    <li><span>Category: </span><?= $movie['category'] ?></li>
                    <li><span>Quality: </span>UHD</li>
                    <li><span>Views: </span><?= rand(100, 9999) ?></li>
                    <li><span>Price: </span><?= $movie['qmimi'] ?> €</li>
                </ol>
            </div>
            <div class="col-lg-4">
                <img src="images/<?= $movie['image'] ?>" alt="" style="width: 100%;">
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="container" style="margin-bottom: 4.2%;">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="review-section">
                <div class="reviews">
                    <h5>Reviews</h5>
                    <?php foreach ($commenti as $comment) : ?>
                        <div class="review">
                            <img src="images/user.png" alt="" style="display:inline;">
                            <h6 style="display:inline; white-space:nowrap;"><?= $comment['username'] ?></h6>
                            <p><?= $comment['review'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="your-comment">
                    <h5>Your Comment</h5>
                    <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $movie_id; ?>" method="POST">
                        <textarea placeholder="Your Comment" name="review" style="font-size: 18px;"></textarea>
                        <input type="hidden" value="<?= $movie_id ?>" name="movie_id" />
                        <input type="hidden" value="<?= $user_id ?>" name="user_id" />
                        <input type="hidden" value="<?= $username ?>" name="username" />
                        <div style="display: flex; justify-content: center;">
                            <button type="submit" name="submit" class="button">Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include_once 'controller/commentController.php'; ?>

        <div class="col-lg-6 col-md-6 booki">
            <a href="./booking.php?id=<?= $movie_id ?>" class="watch-btn"><span style="margin-top: 8%;">Book your ticket</span></a>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>