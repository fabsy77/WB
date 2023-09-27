<?php

include('../class/Products.php');

if(isset($_GET) && isset($_GET['id']) ){

    $product = new Product();
    $removeProduct = $product->delete($_GET['id']);//tentei por params e deu erro

    
        var_dump($removeProduct);
        if($removeProduct){
            session_start();
            $_SESSION['msg'] = 'Product deleted successfully.';
        }
        else{
            session_start();
            $_SESSION['msg'] = 'Error while deleting the product.';
        }

        header('Location: Adm_products.php');
    
}
?>