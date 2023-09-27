<?php

    include_once('../class/Products.php');
    include_once('../modules/config.php');
    


    $product = new Product();

    //var_dump($product->getProductsByID($_GET['id']));

    if(isset($_GET) && !empty($_GET) && isset($_GET['id']) && !empty($_GET['id'])){
        $product = new Product();
        $productAttr = $product->getProductsByID($_GET['id']);

        $id = $productAttr[0]['id'];
        $name = $productAttr[0]['name'];
        $price = $productAttr[0]['price'];
        
        $description = $productAttr[0]['description'];
        $item_code = $productAttr[0]['item_code'];
        $image = $productAttr[0]['image_path'];


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Products</title>
</head>
<body>
    <?php include('../view/header.php');?>
    <div class="container">
        <a href="Adm_products.php">All Products</a>
    
        <form action="formEditProducts.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
            <label for=""></label>Name<br>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>
            <label for=""></label>Price<br>
            <input type="text" name="price" step=".0" value="<?php echo $price;?>"><br>
            <label for=""></label>Description<br>
            <input type="text" name="description" value="<?php echo $description; ?>"><br><br>
            <label for=""></label>Product Code<br>
            <input type="text" name="item_code" value="<?php echo $item_code; ?>"><br><br>
            <img src="<?php echo $image;?>"alt="teste" width="300"><br>            
            <input type="file" name="fileToUpload"><br><br>
            <button type="submit">Edit a product</button>
        </form>
        <?php
          include_once('../view/msg.php');
    ?>
    </div>
</body>
</html>