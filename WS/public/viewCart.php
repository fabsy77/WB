<?php 

session_start();

include_once("../modules/config.php");
include_once('../class/Sql.php');
include_once("../class/Cart.php");
include_once('../class/Products.php');
include_once("../class/ProductsCart.php");

$cart = new Cart();

if ( isset($_SESSION['cartId']) ) {
    $productsInCart = $cart->getAllProductsid($_SESSION['cartId']);
} else {
    $productsInCart = [];
}
$totalInCart = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
</head>
<body>

    <div class="container">

    <a href="../index.php">All products</a><br><br>

        <ul>
            <?php foreach ($productsInCart as $product) { ?>
                <li style="display: flex; margin:10px;">
                    <?php 
                        //instanciando a classe Product e ProductsCarts
                        $productInfo = new Product();
                        $productCart = new ProductsCart();
                        
                        //produtos que serao listados(mostrados)
                        $productInfo = $productInfo->getProductsByID($product['product_id']);
                        //retorna a quantidade quem te no carrinho atraves do cartId e product_id (cart_id salvo na sessao)
                        $qttProduct  = $product['quantity']; 

                        

                   /*      calcula o preco total dos produtos no carrinho de compra
                        multiplica o preco do produto $productInfo[0]['price'] 
                        pela quantidade desse produto no carrinho $qttProduct[0]['qtt']. */

                        $totalInCart += ($productInfo[0]['price'] * $qttProduct);
                    ?>

                    <img src="<?php echo SITE_ROOT.$productInfo[0]['image_path']; ?>" alt="" width="150">
                    <p>Name: <?php echo $productInfo[0]['name']; ?></p><br>  <!--  Exibe o nome do produto -->
                    <p>Quantity: <?php echo $qttProduct; ?></p><br>  <!--  Exibe a qunatidade -->
                    <p>Price: <?php echo $productInfo[0]['price']; ?></p> <!--  Exibe o preco -->

                    <!--Link q redireciona para a pagina"formDeleteProductCart.php" 
                    e inclui um parâmetro na URL chamado "productcartid" que contém o ID do produto no carrinho. Permite
                    que a página "formDeleteProductCart.php" identifique qual produto o usuário deseja remover do carrinho com base no valor do parâmetro.  -->
                    <a href="formDeleteProductCart.php?productcartid=<?php echo $product['id']; ?>">Remove</a>

                </li>
            <?php } ?>
        </ul>

        <p>
            <?php
                include_once('../view/msg.php');
            ?>
        </p>

        <div>
            <h3>Total: R$ <?php echo $totalInCart; ?></h3>
        </div>

        <a href="finishOrder.php">Finish Cart</a>
        

    </div>

</body>
</html>