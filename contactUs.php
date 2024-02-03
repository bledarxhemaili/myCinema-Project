<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>myCinema</title>
    <link rel="shortcut icon" href="images/video1.png"/>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
	<style>
		body {

			font-family: Arial, sans-serif;
		}

		form {
			margin: 50px auto;
			max-width: 500px;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}
		label {
			display: block;
			margin-bottom: 10px;
			color: #333;
		}
		input[type="text"],
		input[type="email"],
		textarea {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 20px;
			font-size: 16px;
			color: #333;
		}
		
	</style>
</head>
<body>
    <?php include('header.php'); ?>

    <div class="contact">
		<h2>Contact Us</h2>
		<p>Have questions or suggestions? Feel free to reach out to us!</p>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>
			<label for="message">Message:</label>
			<textarea id="message" name="message" rows="10" required></textarea>
			<input type="submit" value="Submit"  name="submit" class="submit">
		</form>
		<?php include_once 'controller/contactController.php';?>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
