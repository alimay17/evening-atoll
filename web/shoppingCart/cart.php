<?php
session_start();
$pageTitle = "Shopping Cart";
require('header.php'); 
?>

<!------------------------ HEADER --------------------------->
<div class="row">
  <div class="col-12">
    <div class="header">
      <h1>School Bus Clearing House</h1>
    </div>
  </div>
</div>
<!------------------------- MENU --------------------------->
<?php require('menu.php');?>
<!----------------------- SIDEBAR -------------------------->
<div class="row">
<?php require('sidebar.php');?>
<!------------------------- BODY --------------------------->
    <div class="col-9">
      <h2>Shopping Cart Items</h2>
      <div id="message"></div>
      <div id="cart"><?php require('cartItems.php'); ?></div>
      <button><a href="items.php">Continue Shopping</a></button>
      <button id="checkOut"><a href="checkout.php">Check Out</button>
  </div>
  </div>
<!------------------------ FOOTER --------------------------->
  <div class="row">
    <div class="col-12">
      <div class="footer">
        <? require('footer.php'); ?>
      </div>
    </div>
  </div>

</body>
</html>