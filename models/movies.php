<?php

class Movie{
    private $name;
    private $pershkrimi;
    private $category;
    private $image;


    function __construct($name, $pershkrimi, $category, $image){
            $this->name = $name;
            $this->pershkrimi = $pershkrimi;
            $this->category = $category;
            $this->image = $image;

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

}

?>