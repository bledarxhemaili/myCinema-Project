<?php
$id = $_GET['id'];

include_once 'repository/bookingRepository.php';

$bookingRepository = new BookingRepository();

$bookingRepository->deleteBooking($id);
?>
