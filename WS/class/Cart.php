<?php

include_once("Sql.php");
include_once("ProductsCart.php");


class Cart{
///???????
    private $cart;
    private $sql;


    public function __construct() {///?
        $this->sql = new Sql();
    }

    //retorna os produtos que esta dentro do product_id
    public function getAllProductsid($id){

        $productsCart = new ProductsCart();
        
        return $productsCart->getByCartId($id);

    }

    public function getProductInCartByCartIdAndProductId($cartId, $productId){

        $productsCart = new ProductsCart();
        
        return $productsCart->getByCartIdAndProductId($cartId, $productId);

    }

    public function getCartByUserId($userId) {
        $params = [':uuserid' => $userId                
    
        ];
        $query = $this->sql->query('SELECT * FROM cart WHERE user_id = :uuserid AND date_deleted IS NULL' ,  $params);

        return $query;
    }

    public function getAllCart(){

 
        $query = $this->sql->query('SELECT * FROM cart WHERE date_deleted IS NULL');

        return $query;

    }
    public function create($userId){

        $params = [
            ':uuserId'=> $userId
        ];

         $this->sql->query('INSERT INTO cart(user_id ) VALUES(:uuserId)', $params,true);//quando usar true ou nao?

         $queryIdCart = $this->sql->query("SELECT id FROM cart WHERE user_id = :uuserId AND date_deleted IS NULL", $params);

        return $queryIdCart[0]['id'];
    }


    public function addItem($cartId, $productId, $quantity)
    {
        $productsCart = new ProductsCart();
        return $productsCart->create($cartId, $productId, $quantity);
    }
    
    public function updateItem($cartId, $productId, $quantity)
    {
        $productsCart = new ProductsCart();
        return $productsCart->update($cartId, $productId, $quantity);
    }
    public function finishCart($cartId)
    {

        $params = [
            ':ucartid' => $cartId,
        ];
    
        return $this->sql->query("UPDATE cart SET date_deleted = NOW() WHERE id = :ucartid", $params, true);


    }

}

?>

