<?php
include_once('Sql.php');

class Product{

    private $product;
    private $sql;

    public function __construct() {
        $this->sql = new Sql();
    }

    public function getProductsByID($id){

        $params = [':uid' => $id                
    
    ];
        $query = $this->sql->query('SELECT * FROM products WHERE id = :uid',  $params);

        return $query;
    }

    public function getAllProducts(){

        $query = $this->sql->query('SELECT * FROM products');

        return $query;
    }

    public function create($name, $price, $description, $item_code, $imagePath){//pq aqui nao comecou com query 

        $params = [
            ':uname' => $name,
            ':uprice' => $price,
            ':udescription' => $description,
            ':uitem_code' => $item_code,
            ':uimage' => $imagePath
        ];

        
        //retorna verdadeiro (true) se a consulta for executada com sucesso, ou falso (false) em caso de erro.
        return $this->sql->query("INSERT INTO products (name, price,  description, item_code, image_path ) VALUES (:uname, :uprice,  :udescription, :uitem_code, :uimage )", $params, true);//retorna verdadeiro ou falso
    }
    public function update($id, $name, $price, $description, $item_code, $imagePath) {
        $params = [
            ':uid' => $id,
            ':uname' => $name,
            ':uprice' => $price,
            ':udescription' => $description,
            ':uitem_code' => $item_code,
            ':uimage' => $imagePath
        ];
        if($this->isDuplicateCodItem($item_code, $id)){

            return false;
        }
    
        return $this->sql->query("UPDATE products SET name = :uname, price = :uprice,  description = :udescription, item_code = :uitem_code, image_path = :uimage WHERE id = :uid", $params, true);
    }

    public function delete($id) {
        $params = [
            ':uid' => $id
        ];
    
        return $this->sql->query("DELETE FROM products WHERE id = :uid", $params, true);
    }

    private function isDuplicateCodItem($item_code, $id = 0){
        $params = [
            ':uitem_code' => $item_code
        ];
        if($id != 0){
            $params = [
                ':uitem_code' => $item_code,
                ':uid' => $$id
            ];
            $query =  $this->sql->query("SELECT * FROM products WHERE item_code = :uitem_code AND id != :uid", $params);
        }
        else{
            $params = [
                ':uitem_code' => $item_code
            ];
            $query =  $this->sql->query("SELECT * FROM products WHERE item_code = :uitem_code", $params);

        }
        

        if(!empty($query)){
            return true;
        }
        return false;
    }
}

?>

