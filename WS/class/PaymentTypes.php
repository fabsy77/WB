<?php

include_once("Sql.php");
class PaymentTypes{

    private $paymentTypes;
    private $sql;


    public function __construct() {
        $this->sql = new Sql();
    }

    public function getAllProductsid($id){

        $params = [':uid' => $id                
    
    ];
        $query = $this->sql->query('SELECT * FROM payment_types WHERE id = :uid',  $params);

        return $query;

    }
    public function getAllPaymentTypes(){

 
        $query = $this->sql->query('SELECT * FROM payment_types');

        return $query;

    }

}

?>

