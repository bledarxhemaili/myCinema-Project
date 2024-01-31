<?php
    $id = $_GET['id'];

    include_once 'repository/userRepository.php';

    $userRepository = new UserRepository();
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
                $users = $userRepository->getUserById($id);
                foreach ($users as $user) {
            ?>
            <div class="col-lg-12 " style="display: flex; justify-content: center; align-items: center; align-content: center;">
            
                <form method="POST" action="" id="forma">             
                    <h1>Forma per ndryshimin e rezervimeve ne databaz</h1>

                    <input type="text" name="id" value="<?=$user['id']?>" readonly> <br> <br>
                    <input type="text" name="firstname" value="<?=$user['firstname']?>" ><br><br>
                    <input type="text" name="lastname" value="<?=$user['lastname']?>" ><br><br>
                    <input type="text" name="username" value="<?=$user['username']?>" ><br><br>
                    <input type="text" name="email" value="<?=$user['email']?>"><br><br>
                    <input type="number" name="number" value="<?=$user['number']?>"><br><br>
                    <input type="text" name="password" value="<?=$user['password']?>"><br><br>
                    <input type="text" name="admin" value="<?=$user['admin']?>"><br><br>

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
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $password = $_POST['password'];
            $admin = $_POST['admin'];

            $userRepository->updateUser($id, $firstname, $lastname, $username, $email, $number, $password, $admin);
        }
    ?>
    
</body>
</html>
