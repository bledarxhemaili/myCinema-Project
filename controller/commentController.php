<?php
include_once 'repository/commentRepository.php';
include_once 'models/comments.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if(empty($_POST['movie_id']) || empty($_POST['user_id']) || empty($_POST['username']) || empty($_POST['review']) ){
        echo "Fill all fields!";
    }else{
        $movie_id = $_POST['movie_id'];
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $review = $_POST['review'];

        $comment  = new Comments($movie_id, $user_id, $username, $review);
        $commentRepository = new CommentRepository();

        $commentRepository->insertComments($comment);
    }

}

?>