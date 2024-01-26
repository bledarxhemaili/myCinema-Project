<?php

class Comments{
    private $movie_id;
    private $user_id;
    private $username;
    private $review;


    function __construct($movie_id, $user_id, $username, $review){
            $this->movie_id = $movie_id;
            $this->user_id = $user_id;
            $this->username = $username;
            $this->review = $review;

    }

    function getMovie_id(){
        return $this->movie_id;
    }
    function getUser_id(){
        return $this->user_id;
    }
    function getUsername(){
        return $this->username;
    }
    function getReview(){
        return $this->review;
    }

}

?>