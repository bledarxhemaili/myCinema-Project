<?php

class Payment{
    private $booking_id;
    private $shuma;
    private $cardNumber;
    private $cardExpiryMonth;
    private $cardExpiryYear;
    private $cardCVC;
    private $cardPlaceholder;


    function __construct($booking_id, $shuma, $cardNumber, $cardExpiryMonth, $cardExpiryYear, $cardCVC, $cardPlaceholder){
            $this->booking_id = $booking_id;
            $this->shuma = $shuma;
            $this->cardNumber = $cardNumber;
            $this->cardExpiryMonth = $cardExpiryMonth;
            $this->cardExpiryYear = $cardExpiryYear;
            $this->cardCVC = $cardCVC;
            $this->cardPlaceholder = $cardPlaceholder;

    }


    function getBooking_id(){
        return $this->booking_id;
    }
    function getShuma(){
        return $this->shuma;
    }
    function getCardNumber(){
        return $this->cardNumber;
    }
    function getCardExpiryMonth(){
        return $this->cardExpiryMonth;
    }
    function getCardExpiryYear(){
        return $this->cardExpiryYear;
    }
    function getCardCVC(){
        return $this->cardCVC;
    }
    function getCardPlaceholder(){
        return $this->cardPlaceholder;
    }
}

?>
