<?php
    include_once('middleware.php');
    include_once('../class/Products.php');
    include_once('../modules/config.php');



    $products = new Product();
    $allProducts = $products->getAllProducts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once('../view/header.php') ?>
    
    <div class="container">
        <a href="CreateProducts.php">Create Products</a>
    </div>
    <div class="container">
        <ul style="list-style: none;">
            <?php foreach($allProducts as $products){ ?>
                <li> 
                <img src="<?php echo SITE_ROOT . $products['image_path'];?> " width="150"><br><br>
                    <?php  
                    echo "Name:" . $products['name'] . " - Price: $" . $products['price']; ?>
                    <a href="editProducts.php?id=<?php echo $products['id'];?>">Edit</a>
                    <a href="formRemoveProducts.php?id=<?php echo $products['id'];?>">Remove</a>
                </li>
            
            <?php } ?>
        </ul>
        <?php
             include('../view/msg.php');
        ?>
    </div>
</body>
</html>