<?php
$id = $_GET['id'];

include_once 'repository/userRepository.php';

$userRepository = new UserRepository();

$userRepository->deleteUser($id)
?>
