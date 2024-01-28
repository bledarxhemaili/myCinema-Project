<?php

class Booking{
    private $movie_id;
    private $user_id;
    private $s_numbers;
    private $date;
    private $time;
    private $totali;



    function __construct($movie_id, $user_id, $s_numbers, $date, $time, $totali){
            $this->movie_id = $movie_id;
            $this->user_id = $user_id;
            $this->s_numbers = $s_numbers;
            $this->date = $date;
            $this->time = $time;
            $this->totali = $totali;

    }

    function getMovie_id(){
        return $this->movie_id;
    }
    function getUser_id(){
        return $this->user_id;
    }
    function getS_numbers(){
        return $this->s_numbers;
    }
    function getDate(){
        return $this->date;
    }
    function getTime(){
        return $this->time;
    }
    function getTotali(){
        return $this->totali;
    }

}

?>