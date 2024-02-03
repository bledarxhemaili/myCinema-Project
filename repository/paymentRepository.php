<?php 
include_once 'database/databaseConnection.php';

class PaymentRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }


    function insertPayment($payment){

        $conn = $this->connection;

        $booking_id = $payment->getBooking_id();
        $shuma = $payment->getShuma();
        $cardNumber = $payment->getCardNumber();
        $cardExpiryMonth = $payment->getCardExpiryMonth();
        $cardExpiryYear = $payment->getCardExpiryYear();
        $cardCVC = $payment->getCardCVC();
        $cardPlaceholder = $payment->getCardPlaceholder();


        $sql = "INSERT INTO payment (booking_id, shuma, cardNumber, cardExpiryMonth, cardExpiryYear, cardCVC, cardPlaceholder) VALUES (?,?,?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$booking_id, $shuma, $cardNumber, $cardExpiryMonth, $cardExpiryYear, $cardCVC, $cardPlaceholder]);

        header("location:dashboard.php");

    }


    function getAllPayments(){
        $conn = $this->connection;

        $sql = "SELECT * FROM payment";

        $statement = $conn->query($sql);
        $payments = $statement->fetchAll();

        return $payments;
    }

    function getPaymentById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM payment WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $payments = $statement->fetchAll();

        return $payments;
    }

    function updatePayment($id, $booking_id, $shuma, $cardNumber, $cardExpiryMonth, $cardExpiryYear, $cardCVC, $cardPlaceholder){
         $conn = $this->connection;

         $sql = "UPDATE payment SET booking_id=?, shuma=?, cardNumber=?, cardExpiryMonth=?, cardExpiryYear=?, cardCVC=?, cardPlaceholder=? WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$booking_id, $shuma, $cardNumber, $cardExpiryMonth, $cardExpiryYear, $cardCVC, $cardPlaceholder, $id]);

         header("location:dashboard.php");
    } 
    
    function deletePayment($id){
        $conn = $this->connection;

        $sql = "DELETE FROM payment WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        header("location:dashboard.php");
   } 
}

?>