<?php
   session_start();
   
   $id = $_GET['id'];
   
   include_once 'repository/bookingRepository.php';
   
   $bookingRepository = new BookingRepository();
   
   $bookings = $bookingRepository->getBookingById($id);
   
   if (isset($_POST['submit'])) {
       include_once 'controller/paymentController.php';
   }
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <link rel="shortcut icon" href="images/video1.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>


        h2 {
            text-align: center;
            margin-top: 9%;
        }
        h4 {
            text-align: center;
            margin-top: 1%;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        label {
            font-size: 18px;
            margin-bottom: 8px;
            color: black;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 16px;
        }

     
    </style>
</head>
<body>


<?php

foreach ($bookings as $booking) {
  ?>
    <h2>Enter Payment Information</h2>
    <h4>Totali: <?php echo $booking['totali']; ?> €</h4>
   
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="contanier">
    
        <div class="col">
            <div class="col-md-12">
                <label for="cardNumber">Card Number:</label>
                <input type="number" name="cardNumber" required>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="cardExpiryMonth">Expiry Month:</label>
                    <input type="number" name="cardExpiryMonth" required>
                </div>
                <div class="col-md-4">
                    <label for="cardExpiryYear">Expiry Year:</label>
                    <input type="number" name="cardExpiryYear" required>
                </div>
                <div class="col-md-4">
                    <label for="cardCVC">CVC:</label>
                    <input type="number" name="cardCVC" required>
                </div>
            </div>
            <div class="col-md-12">
                <label for="cardExpiryYear">Card placeholder:</label>
                <input type="text" name="cardPlaceholder" required>
            </div>

            <button type="submit" name="submit" class="submit">Pay</button>
        </div>
    </div>

    <input type="hidden" value="<?php echo $booking['id']; ?>" name="booking_id" />
    <input type="hidden" value="<?php echo $booking['totali']; ?>" name="shuma" />

        
    </form>
    <?php
        }
    ?>
</body>
</html>
