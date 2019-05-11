<?php
session_start();
$pageTitle = "Shopping Cart";
require('header.php'); 
?>

<!--------------------- MENU & SIDEBAR ---------------------->
<?php require('menu.php');?>
<div class="row">
<?php require('sidebar.php');?>
<!------------------------- BODY --------------------------->
<div class="col-9">
  <h2>Shopping Cart Items</h2>
  <div id="message"></div>
  <div id="cart">
    <?php require('cartItems.php');
      $total = 0;
      if($_SESSION['cart']){
    foreach ( $_SESSION['cart'] as $num ) {
    ?>
    <tr>
    <td>
      Item: <?php echo $items[$num]['name']; ?>
    </td>
    <td>
      Price: <?php echo '$' . number_format($items[$num]['price']);?>
    </td>
    <td id="remove">
      <button name='delete' onclick='deleteItem(<?php echo $num; ?>)'
      value='<?php echo $num; ?>'>Remove</button><br/>
    </td>
  </tr>
  <?php
    $total += $items[$num]['price'];
    } // end foreach

  } else echo "<p>No items in cart</p>";
?>
  Total: $<?php echo number_format($total); ?>

  </div>
  <button><a href="items.php">Continue Shopping</a></button>
  <button id="checkOut"><a href="checkout.php">Check Out</button>
</div>
</div>
<!------------------------ FOOTER --------------------------->
<? require('footer.php'); ?>