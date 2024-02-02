<?php
include_once 'repository/paymentRepository.php';
include_once 'models/payment.php';

if(isset($_POST['submit'])){
    if(empty($_POST['booking_id']) || empty($_POST['shuma']) || empty($_POST['cardNumber']) || empty($_POST['cardExpiryMonth']) 
    || empty($_POST['cardExpiryYear']) || empty($_POST['cardCVC']) || empty($_POST['cardCVC'])|| empty($_POST['cardPlaceholder'])){
        echo "Fill all fields!";
    }else{
        $booking_id = $_POST['booking_id'];
        $shuma = $_POST['shuma'];
        $cardNumber = $_POST['cardNumber'];
        $cardExpiryMonth = $_POST['cardExpiryMonth'];
        $cardExpiryYear = $_POST['cardExpiryYear'];
        $cardCVC =  $_POST['cardCVC']; 
        $cardPlaceholder = $_POST['cardPlaceholder']; 


        $payment  = new Payment($booking_id, $shuma, $cardNumber, $cardExpiryMonth, $cardExpiryYear, $cardCVC,  $cardPlaceholder);
        $paymentRepository = new PaymentRepository();

        $paymentRepository->insertPayment($payment);


    }

}

?>