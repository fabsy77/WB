<?php
    include('../class/Products.php');
    include('../modules/config.php');



    if(isset($_GET) && isset($_GET['id'])){

        $product = new Product();
        $productDetails = $product->getProductsByID(($_GET['id']));

        //nao entendi essa parte e o q ta dentro do array é o que vem do formulario?

        
        $name = $productDetails[0]['name']; 
        $price = $productDetails[0]['price'];
        $description = $productDetails[0]['description'];
        $image = $productDetails[0]['image_path'];

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View product</title>
</head>
<body>

    <?php include_once("../view/header.php"); ?>
    <div class="container">
        <a href="<?php echo SITE_ROOT; ?>/index.php">All products</a><br><br>
    
        <form method="post" action="formAddToCart.php">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <img src="<?php echo $image ?>"  width="300">
            <h2><?php echo $name; ?></h2>
            <h4><?php echo $description; ?></h4>
            <p>price: $<?php echo $price; ?></p>
            <div>
                <label for="qttProduct">Quantity: </label>
                <input type="number" name="qttProduct" min="1" max="100" value="1"><br><br>
            </div>
            <button type="submit">Add to Cart</button>
        </form>
        <?php include("../view/msg.php"); ?>
    </div>
</body>
</html>