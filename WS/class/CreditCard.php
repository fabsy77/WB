<?php 

include_once("Sql.php");

class CreditCard {

    private $sql;

    public function __construct() {
        $this->sql = new Sql();
    }

    public function create($utype, $uowner, $ucardnumber) {

        $params = [
            ':utype' => $utype,
            ':uowner'=> $uowner,
            ':ucardnumber'=> $ucardnumber,
        ];

        $insert =  $this->sql->query("
        INSERT INTO credit_card (card_type, card_number, card_owner) 
        VALUES (:utype, :ucardnumber, :uowner)", $params, true);

        if ( $insert ) {
            return $this->getAllInfosCreditCard($utype, $uowner, $ucardnumber);
        }

    }
    public function getAllInfosCreditCard($utype, $uowner, $ucardnumber) {

        $params = [
            ':utype' => $utype,
            ':uowner'=> $uowner,
            ':ucardnumber'=> $ucardnumber,
        ];

        return $this->sql->query("SELECT * FROM credit_card WHERE card_type = :utype AND card_number = :ucardnumber AND card_owner = :uowner", 
                                    $params);

    }
    public function getCardByID($id) {

        $params = [
            ':uid' => $id,
            
        ];

        return $this->sql->query("SELECT * FROM credit_card WHERE id = :uid", $params);

    }

}

?>