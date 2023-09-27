<?php

if(session_status() !== PHP_SESSION_ACTIVE){

  session_start();

}

?>

<link rel="stylesheet" href="../src/css/header.css">
<div class="topnav">
  <a href="#home">Home</a>
  
  <?php if ( isset($_SESSION['user_info']) && $_SESSION['user_info'][0]['role'] == USER_ADMIN_ID ) { ?>

      <a href="<?php echo SITE_ROOT; ?>/Adm/Adm_products.php">Products</a>

  <?php } else { ?>

  <a href="<?php echo SITE_ROOT; ?>/index.php">Products</a>

  <?php } ?>

  <?php if (isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['user_info']) && $_SESSION['user_info'][0]['role'] != USER_ADMIN_ID ) { ?>
    <a href="<?php echo SITE_ROOT; ?>/public/viewCart.php">Cart</a>
  <?php } ?>

  <?php if(isset($_SESSION['login']) && $_SESSION['login']){?>
    <a href="<?php echo SITE_ROOT; ?>/logout.php">Logout</a>
  <?php } else {?>
    <a href="<?php echo SITE_ROOT; ?>/public/userLogin.php">Login</a>
    <?php }?>
</div>

