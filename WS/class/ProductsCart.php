<?php 

include_once("Sql.php");

class ProductsCart {

    private $sql;

    public function __construct() {
        $this->sql = new Sql();
    }

    public function create($cartId, $productId, $quantity) {
        $params = [
            ':ucartid' => $cartId,
            ':uproduct_id' => $productId,
            ':uquantity' => $quantity,
        ];
                                                                                                                // quando for insert usa se true
        return $this->sql->query("INSERT INTO products_cart (cart_id, product_id, quantity) VALUES (:ucartid, :uproduct_id, :uquantity)", $params, true);
    }

    public function update($cartId, $productId, $quantity) {
        $params = [
            ':ucartid' => $cartId,
            ':uproductid' => $productId,
            ':uquantity' => $quantity,
        ];

        return $this->sql->query("UPDATE products_cart SET quantity = :uquantity WHERE cart_id = :ucartid AND product_id = :uproductid", $params, true);
    }

    //deleta do carrinho
    public function delete($productCartId) {
        $params = [
            ':uid' => $productCartId,
        ];
    
        return $this->sql->query("DELETE FROM products_cart WHERE id = :uid", $params, true);
    }

    public function getByCartId($idCart) {
        $params = [
            ':ucart_id' => $idCart,
        ];
        // foi adicionado o GROUP BY 
        return $this->sql->query("SELECT * FROM products_cart WHERE cart_id = :ucart_id GROUP BY product_id", $params);
    }

    //CRIAR UMA FUNÇÃO PARA LISTAR QUANTOS DO MESMO PRODUTO TEM DENTRO DE DETERMINADO CARRINHO atraves do Id co carrinho e id do produto
    public function getByCartIdAndProductId($cartId, $productId) {
        $params = [
            ':ucartid' => $cartId,
            ':uproductid' => $productId,
        ];
       
        return $this->sql->query("SELECT * FROM products_cart WHERE cart_id = :ucartid AND product_id = :uproductid", $params);
    }

/*A função COUNT(*): conta todas as linhas na tabela.
    FROM products_cart: Isso especifica a tabela da qual você deseja contar as linhas, que é a tabela "products_cart"
    WHERE cart_id = :ucartid AND product_id = :uproduct_id: condições A condição diz que você deseja contar as linhas onde o valor da coluna 
    "cart_id" seja igual ao valor associado à variável chamada ":ucartid" */
}