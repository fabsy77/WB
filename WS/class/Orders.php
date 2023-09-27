<?php
include_once("Sql.php");

class Orders{

    private $order;
    private $sql;


    public function __construct() {
        $this->sql = new Sql();
    }


    public function getAllProductsid($id){

        $params = [':uid' => $id                
    
    ];
        $query = $this->sql->query('SELECT * FROM orders WHERE id = :uid',  $params);

        return $query;

    }

    public function getAllOrders(){

 
        $query = $this->sql->query('SELECT * FROM orders');

        return $query;

    }
    public function create($ucartid, $ucreaditcartid, $upaymenttype, $uorderstatus, $returnAllColumns = true) {

        $params = [
            ":ucartid" => $ucartid,
            ":ucreaditcartid" => $ucreaditcartid,
            ":upaymenttype" => $upaymenttype,
            ":uorderstatus" => $uorderstatus,
        ];

        $insert = $this->sql->query("
            INSERT INTO orders (cart_id, credit_cart_id, payment_type, order_status) 
            VALUES (:ucartid, :ucreaditcartid, :upaymenttype, :uorderstatus)", $params, true);

        if ($returnAllColumns) {
            return $this->getOrdersByAllColumns($ucartid, $ucreaditcartid, $upaymenttype, $uorderstatus);
        }else if($insert ){
            return true;
        }

    }

    public function getOrdersByAllColumns($ucartid, $ucreaditcartid, $upaymenttype, $uorderstatus) {
        $params = [
            ":ucartid" => $ucartid,
            ":ucreaditcartid" => $ucreaditcartid,
            ":upaymenttype" => $upaymenttype,
            ":uorderstatus" => $uorderstatus,
        ];

        return $this->sql->query("
            SELECT * FROM orders
            WHERE cart_id = :ucartid 
            AND credit_cart_id = :ucreaditcartid 
            AND payment_type = :upaymenttype 
            AND order_status = :uorderstatus", $params);
    }
    public function changeOderStatusToFinished($cartId)
    {
        $params = [
            ':ucartid' => $cartId
        ];

        // 2 = finalizado
        return $this->sql->query("UPDATE orders SET order_status = 2 WHERE cart_id = :ucartid", $params, true);
    }
    public function getOrdersByCardId($ucartid) {
        $params = [
            ":ucartid" => $ucartid,
            
        ];

        return $this->sql->query("
            SELECT * FROM orders
            WHERE cart_id = :ucartid ", $params);
    }


}

?>

