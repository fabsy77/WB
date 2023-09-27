<?php

    session_start();

    include_once("../class/CreditCard.php");
    include_once("../class/Orders.php");

    if (
        isset($_POST['type']) &&
        isset($_POST['owner']) &&
        isset($_POST['card_number']) &&
        isset($_POST['cvc']) &&
        isset($_POST['month_valid']) &&
        isset($_POST['year_valid'])
    ) {

        $creditcard = new CreditCard();
        $creditCardInfos = $creditcard->create($_POST['type'], $_POST['owner'], $_POST['card_number']);
        $orderCreatedStatus = 1;
        $order = new Orders();
        $createdOrder = $order->create($_SESSION['cartId'], $creditCardInfos[0]['id'], 'card', $orderCreatedStatus);

        if ( $createdOrder ) {
            header("Location: confirmOrder.php");
            return;
        }
        

    }

?>