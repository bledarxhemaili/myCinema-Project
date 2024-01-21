<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link rel="shortcut icon" type="image/x-icon" href="images/video1.png" />
</head>
<body>
    <form method="POST" action="upload.php">
        <h1>Forma per shtimin e filmave ne databaz</h1>
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="text" name="category" placeholder="Category"><br><br>
        <textarea type="text" name="pershkrimi" placeholder="Pershkrimi" rows="4" cols="20"></textarea><br><br>

        <input type="file" name="image" placeholder="Image"><br><br><br>

        <button type="submit" name="submit">Shto</button>
    </form>
    <?php
    include_once('config.php');

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $pershkrimi = $_POST['pershkrimi'];
        $category = $_POST['category'];
        $image = $_POST['image'];
        

        $sql = "INSERT INTO movies (name, pershkrimi, category, image) VALUES (:name, :pershkrimi, :category, :image)";
        $newMovie = $conn->prepare($sql);
        $newMovie->bindParam(':name', $name);
        $newMovie->bindParam(':pershkrimi', $pershkrimi);
        $newMovie->bindParam(':category', $category);
        $newMovie->bindParam(':image', $image);

        $newMovie->execute();
        echo "Te dhenat jane shtuar me sukses";

    }


?>
</body>
</html>
