<?php
session_start();
echo "<h3>Thank you for your order</h3>";
echo "<p>Your will be contacted when your items
  are ready for delivery</p>";
?>

<div id="cart"><?php require('cartItems.php');?></div>

<?php
session_destroy();
$_SESSION["cart"] = array();
?>
