<?php 

session_start();
include_once("../modules/config.php");
include_once("../class/Cart.php");
include_once("../class/Products.php");
include_once("../class/Address.php");
include_once("../class/Orders.php");
include_once("../class/CreditCard.php");

$cart = new Cart();
$productsInCart = $cart->getAllProductsid($_SESSION['cartId']);
$totalInCart = 0;
$fullName =   $_SESSION['user_info'][0]['first_name'] . ' ' .$_SESSION['user_info'][0]['last_name'];

$orders = new Orders();
$receiveOrders = $orders->getOrdersByCardId($_SESSION['cartId']); 
$receiveCardId = $receiveOrders[0]['credit_cart_id'];//posicao 0 e coluna

if($receiveOrders[0]['payment_type'] == 'card'){
    $creditCard = new CreditCard();
    $receiveCard = $creditCard->getCardByID($receiveCardId );
}


$address = new Address();
$allAddress = $address->getByUserId($_SESSION['user_info'][0]['id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Confirms the purchase 
    </h1>

    <div>
        <h3>Products in Cart</h3>
        <ul>
            <?php foreach ($productsInCart as $product) { ?>
                <li style="display: flex; margin:10px;">
                    <?php 
                        $productInfo = new Product();
                        $productCart = new ProductsCart();
                        $productInfo = $productInfo->getProductsByID($product['product_id']);
                        $qttProduct  = $product['quantity'];
    
                        $totalInCart += ($productInfo[0]['price'] * $qttProduct);
    
    
                    ?>
                    <img src="<?php echo SITE_ROOT.$productInfo[0]['image_path']; ?>" alt="" width="150">
                    <p>Name: <?php echo $productInfo[0]['name']; ?></p>
                    <br>
                    <p>Qtt: <?php echo $qttProduct; ?></p>
    
                    <p>Price: <?php echo $productInfo[0]['price']; ?></p>
    
                </li>
            <?php } ?>
        </ul>

        <div>
            <h3>Total: R$ <?php echo $totalInCart; ?></h3>
        </div>
    </div>

    <hr>
    <div>

        <h3>Delivery Address</h3>
        <p>Name: <?php echo $fullName; ?></p>
        <p>Street: <?php echo $allAddress[0]['street']; ?></p>
        <p>Street number: <?php echo $allAddress[0]['street_number']; ?></p>
        <p>Zip code: <?php echo $allAddress[0]['zip_code']; ?></p>
        <p>City: <?php echo $allAddress[0]['city']; ?></p>
    </div>
    <hr>
    <div>

        <h3>Invoice Address</h3>
        <p>Name: <?php echo $fullName; ?></p>
        <p>Street: <?php echo $allAddress[1]['street']; ?></p>
        <p>Street number: <?php echo $allAddress[1]['street_number']; ?></p>
        <p>Zip code: <?php echo $allAddress[1]['zip_code']; ?></p>
        <p>City: <?php echo $allAddress[1]['city']; ?></p>
    </div>

    <hr>
    <?php
    if($receiveOrders[0]['payment_type'] == 'card'){
    ?>
    <h3>Metodo de pagamento</h3>

    <p>nome do dono do cartao : <?php echo $receiveCard[0]['card_owner']; ?></p>
    <p>numero do cartao: <?php echo $receiveCard[0]['card_number']; ?></p>
    <p>Tipo de cartao: <?php echo $receiveCard[0]['card_type']; ?></p>
 
    
    <?php } else{?>


        <h3>tipo de pagamento</h3>
        <p>recibo</p>


    <?php }?>
    <a href="orderFinish.php ">Confirms the purchase </a>
  
</body>
</html>