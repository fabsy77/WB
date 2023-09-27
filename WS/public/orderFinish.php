<?php 
    session_start();
    include_once('../modules/config.php');
    include_once('../class/Cart.php');
    include_once('../class/Orders.php');

    // finalizar o carrinho
    $msg = "Você já finalizou sua compra, seu carrinho está vazio.";

    if ( isset($_SESSION['cartId']) ) {
        $cart = new Cart();
        $finishedCart = $cart->finishCart($_SESSION['cartId']);
    
        if ( $finishedCart ) {
            // mudar status do pedido para 2 = finalizado
            $order = new Orders();
            $orderFinished = $order->changeOderStatusToFinished($_SESSION['cartId']);
            if ( $orderFinished ) {
                $msg = "Sua compra foi feita com sucesso!";
                unset($_SESSION['cartId']);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once('../view/header.php');
    ?>
    <h1>
        <?php echo $msg; ?>
    </h1>
</body>
</html>