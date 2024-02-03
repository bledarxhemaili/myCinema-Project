<?php
$id = $_GET['id'];

include_once 'repository/contactRepository.php';

$contactRepository = new ContactRepository();

$contactRepository->deleteComment($id)
?>
