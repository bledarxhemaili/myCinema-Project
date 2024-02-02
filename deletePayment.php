<?php
$id = $_GET['id'];

include_once 'repository/paymentRepository.php';

$paymentRepository = new PaymentRepository();

$paymentRepository->deletePayment($id)
?>
