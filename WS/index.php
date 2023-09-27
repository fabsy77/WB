<?php

    include("./class/Products.php");
    include('./modules/config.php');

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
        <div class="container">
            <?php  include('./view/header.php');?>

        <ul>
            <?php foreach($allProducts as $products){ ?>
                <div> 
                    <img src="<?php echo SITE_ROOT . $products['image_path'];?> " width="150"><br><br>
                    <?php  
                    echo "Name:" . $products['name'] ."<br>" ." Price: $" . $products['price']; ?><br>

                    <a href="./public/viewProduct.php?id=<?php echo $products['id'];?>">Details</a><br>
                        
            </div>
            
            <?php } ?>
        </ul>
    </div>
</body>
</html>