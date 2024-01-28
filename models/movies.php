<?php

class Movie{
    private $name;
    private $pershkrimi;
    private $category;
    private $image;
    private $qmimi;




    function __construct($name, $pershkrimi, $category, $image, $qmimi){
            $this->name = $name;
            $this->pershkrimi = $pershkrimi;
            $this->category = $category;
            $this->image = $image;
            $this->qmimi = $qmimi;

    }


    function getName(){
        return $this->name;
    }
    function getPershkrimi(){
        return $this->pershkrimi;
    }
    function getCategory(){
        return $this->category;
    }
    function getImage(){
        return $this->image;
    }
    function getQmimi(){
        return $this->qmimi;
    }

}

?>