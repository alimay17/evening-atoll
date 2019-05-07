<?php
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
    <div class="col-9">
      <h2>Shopping Cart Items</h2>
      <div id="cart">Cart Items Here</div>
      <button id="checkOut" onclick="checkout()">Check Out</button>
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