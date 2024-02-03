<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>myCinema - About Us</title>
    <link rel="shortcut icon" href="images/video1.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;

        }

        .about-section {
            color: #ffffff;
            padding: 50px 0;
            text-align: center;
        }

        .about-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #f8f9fa;
        }

        .about-section p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .mission-section {
            background-color:  #343a40;
            color: #ffffff;
            padding: 50px 0;
            text-align: center;
        }

        .mission-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color:  #ffffff;
        }

        .mission-section p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .team-section {
            color: #ffffff;
            padding: 50px 0;
            text-align: center;
            margin-bottom: 5%;
        }

        .team-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #f8f9fa;
        }

        .team-member {
            margin-top: 20px;
            text-align: center;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<?php include('header.php'); ?>


    <div class="about-section">
        <div class="container">
            <h2>About Us</h2>
            <p>
                Welcome to myCinema, where cinematic magic meets your screen. We're not just a movie platform; we're your ticket to a world of entertainment. Dive into our carefully curated collection of movies, handpicked for your enjoyment.
            </p>
            <p>
                At myCinema, we believe in the power of storytelling. Our mission is to bring you captivating stories from every genre imaginable. Immerse yourself in a visual feast and let the magic of cinema transport you to new worlds.
            </p>
            <p>
                Join us on this exciting journey as we redefine the way you experience movies. Explore, discover, and indulge in the art of storytelling. Your cinematic adventure starts here at myCinema.
            </p>
        </div>
    </div>

    <div class="mission-section">
        <div class="container">
            <h2>Our Mission</h2>
            <p>
                At myCinema, our mission is to provide a seamless and enjoyable movie-watching experience for our users. We are dedicated to delivering high-quality content that caters to diverse tastes. Through innovation and passion, we aim to be your go-to destination for cinematic entertainment.
            </p>
        </div>
    </div>

    <div class="team-section">
        <div class="container">
            <h2>Meet the Team</h2>
            <div class="row">
                <div class="col-md-6 team-member">
                    <img src="images/bledar.jpg" alt="Team Member 1">
                    <h4>Bledar Xhemaili</h4>
                    <p>Founder & CEO</p>
                </div>
                <div class="col-md-6  team-member">
                    <img src="images/kron.jpg" alt="Team Member 2">
                    <h4>Kron Ismajli</h4>
                    <p>Head of Content</p>
                </div>
            </div>
        </div>
    </div>

  
    <?php include('footer.php'); ?>
</body>
</html>
