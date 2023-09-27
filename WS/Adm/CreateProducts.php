<?php
include_once('../modules/config.php');


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
    
        <form action="formCreateProducts.php" method="post" enctype="multipart/form-data">
            <label for=""></label>Name<br>
            <input type="text" name="name"><br>
            <label for=""></label>Price<br>
            <input type="text" name="price" step=".0"><br>
            <label for=""></label>Quantity<br>
            <input type="number" name="quantity"><br>
            <label for=""></label>Description<br>
            <input type="text" name="description"><br><br>
            <label for=""></label>item code<br>
            <input type="text" name="item_code"><br><br>
            <label for=""></label>Image<br>
            <input type="file" name="fileToUpload"><br><br>
            <button type="submit">Create a product</button>
        </form>
        <?php
            include('../view/msg.php');
        ?>
    
    </div>
</body>
</html>