<?php 
    session_start();
    include_once("../class/Address.php");
    include_once("../class/Orders.php");

    if (
        isset ($_POST['street']) &&
        isset ($_POST['street_number']) &&
        isset ($_POST['zip']) &&
        isset ($_POST['city']) &&
        isset ($_POST['street_fat']) &&
        isset ($_POST['street_number_fat']) &&
        isset ($_POST['zip_fat']) &&
        isset ($_POST['city_fat']) &&
        isset ($_POST['payment_type'])
    ) {
        $userId = $_SESSION['user_info'][0]['id'];
        $typeAddressDelivery = 1;
        $typeAddressInvoice  = 2;
        $paymentCardType = 1;
        $address = new Address();
        $createdDeliveryAddress = $address->create($userId, 
            $_POST['street'], 
            $_POST['street_number'], 
            $_POST['zip'], 
            $_POST['city'], 
            $typeAddressDelivery
        );

        if ( $createdDeliveryAddress ) {
            $createdInvoiceAddress = $address->create($userId, 
                $_POST['street_fat'], 
                $_POST['street_number_fat'], 
                $_POST['zip_fat'], 
                $_POST['city_fat'], 
                $typeAddressInvoice
            
            );

            if ( $createdInvoiceAddress ) {
                if ( $_POST['payment_type'] == $paymentCardType ) {
                    header("Location: CardInfos.php");
                    return;
                } else {
                    $order = new Orders();
                    $createOrders = $order->create($_SESSION['cartId'], null, 'invoice', 1, false);
                    //
                    if($createOrders){
                        header("Location: confirmOrder.php");
                        return;
                    }
                    
                }
            }
        }


    }

?>