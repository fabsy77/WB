<?php 

    include("../classes/Products.php");

    if ( isset($_GET) && isset($_GET['id']) ) {

        $product = new Product();
        $createdProduct = $product->delete($_GET['id']);

        session_start();
        if ( $createdProduct ) {
            $_SESSION['msg'] = "Produto removido com sucesso!";
        } else {
            $_SESSION['msg'] = "Houve um erro ao remover o produto!";
        }

        header("Location: Adm_products.php");


    }

?>