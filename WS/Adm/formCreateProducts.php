<?php

include('../class/Products.php');

    if(isset($_POST) && isset($_POST['name']) 
        && isset($_POST['price']) 
        && isset($_POST['quantity']) 
        && isset($_POST['description']) 
        && isset($_POST['item_code'])
        && isset($_FILES['fileToUpload'])){

        session_start();

        $folderName = '../uploads/';
        $fileName = $folderName . basename($_FILES["fileToUpload"]["name"]);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileName)) {

            $_SESSION['msg'] = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

          } else {

            $_SESSION['msg'] = "Sorry, there was an error uploading your file.";
            header('Location: CreateProducts.php');
            return;

          }
        
        $product = new Product();
        $createdProduct = $product->create($_POST['name'], $_POST['price'],$_POST['description'], $_POST['item_code'], $fileName);//tentei por params e deu erro

        if($createdProduct){
            $_SESSION['msg'] = 'Product created successfully.';
        }
        else{
            $_SESSION['msg'] = 'Error while adding the product.';
        }

        header('Location: CreateProducts.php');
      
    
}





//pq nno primeiro post nao tem um array?
//aqui verifica o que exatamente?
/* isset($_POST) verifica se o array $_POST existe.
isset($_POST['name']) verifica se o campo 'name' foi enviado no formulário.
isset($_POST['price']) verifica se o campo 'price' foi enviado no formulário.
isset($_POST['description']) verifica se o campo 'description' foi enviado no formulário. */
?>

