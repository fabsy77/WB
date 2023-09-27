<?php

include('../class/Products.php');

    if(isset($_POST) && isset($_POST['id']) 
        && isset($_POST['name']) 
        && isset($_POST['price']) 
        && isset($_POST['description']) 
        && isset($_POST['item_code'])
        && isset($_FILES['fileToUpload'])){

        if( empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == "" ){
                $product = new Product();
                $productFileName = $product->getProductsByID($_POST['id']);
                $fileName = $productFileName[0]['image_path'];
        }
        else{
            $folderName = '../uploads';
            $fileName = $folderName . ($_FILES["fileToUpload"]["name"]);
            $movedFile = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileName);

            if(! $movedFile){
                $_SESSION['msg'] = 'Ocorreu um erro fazer o  upload da imagem';
                header('Location: CreatProducts.php');
            }
        }

    $product = new Product();
    $editProduct = $product->update( $_POST['id'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['item_code'], $fileName);//tentei por params e deu erro

    
        var_dump($editProductt);
        if($editProduct){
            session_start();
            $_SESSION['msg'] = 'Product edited successfully".';
        }
        else{
            session_start();
            $_SESSION['msg'] = 'Error while editing the product.';
        }

        header('Location: Adm_products.php');   
}

?>

