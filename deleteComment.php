<?php
$id = $_GET['id'];

include_once 'repository/commentRepository.php';

$commentRepository = new CommentRepository();

$commentRepository->deleteComment($id);
?>
