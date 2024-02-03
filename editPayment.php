<?php
    $id = $_GET['id'];

    include_once 'repository/paymentRepository.php';

    $paymentRepository = new PaymentRepository();
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
            margin-top: 8%;
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
            width: 300px;
            
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
                $payments = $paymentRepository->getPaymentById($id);
                foreach ($payments as $payment) {
            ?>
            <div class="col-lg-12 " style="display: flex; justify-content: center; align-items: center; align-content: center;">
            
                <form method="POST" action="" id="forma">             
                    <h1>Forma per ndryshimin e pageses ne databaz</h1>

                    <div class="form-group">
                        <label for="id">ID: </label>
                        <input type="number" name="id" value="<?=$payment['id']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="booking_id">Booking id: </label>
                        <input type="number" name="booking_id" value="<?=$payment['booking_id']?>">
                    </div>
                    <div class="form-group">
                        <label for="shuma">Shuma: </label>
                        <input type="number" name="shuma" value="<?=$payment['shuma']?>">
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">Card number: </label>
                        <input type="number" name="cardNumber" value="<?=$payment['cardNumber']?>">
                    </div>
                    <div class="form-group">
                        <label for="cardExpiryMonth">Card expiry month: </label>
                        <input type="number" name="cardExpiryMonth" value="<?=$payment['cardExpiryMonth']?>">
                    </div>
                    <div class="form-group">
                        <label for="cardExpiryYear">Card expiry year: </label>
                        <input type="number" name="cardExpiryYear" value="<?=$payment['cardExpiryYear']?>">
                    </div>
                    <div class="form-group">
                        <label for="cardCVC">Card CVC: </label>
                        <input type="number" name="cardCVC" value="<?=$payment['cardCVC']?>">
                    </div>
                    <div class="form-group">
                        <label for="cardPlaceholder">Card Placeholder: </label>
                        <input type="text" name="cardPlaceholder" value="<?=$payment['cardPlaceholder']?>">
                    </div>

                    <br>

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
            $booking_id = $_POST['booking_id'];
            $shuma = $_POST['shuma'];
            $cardNumber = $_POST['cardNumber'];
            $cardExpiryMonth = $_POST['cardExpiryMonth'];
            $cardExpiryYear = $_POST['cardExpiryYear'];
            $cardCVC = $_POST['cardCVC'];
            $cardPlaceholder = $_POST['cardPlaceholder'];

            $paymentRepository->updatePayment($id, $booking_id, $shuma, $cardNumber, $cardExpiryMonth, $cardExpiryYear, $cardCVC, $cardPlaceholder);
        }
    ?>
    
</body>
</html>
