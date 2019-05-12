<?php
session_start();
$pageTitle = "Shopping Cart";
require('header.php'); 
?>

<!------------------------- MENU -------------------------->
<?php require('menu.php');?>
<div class="row">
<!------------------------- BODY --------------------------->
<div class="col-12">
  <h2 class="pageTitle">Shopping Cart Items</h2>
  <div id="message"></div>
  <div id="cart">
<!--------------------- ITEM TABLE ------------------------->
    <table>
      <th>Item</th>
      <th>Price</th>
    <?php require('cartItems.php');
      // get items in cart 
      $total = 0;
      if($_SESSION['cart']){
    foreach ( $_SESSION['cart'] as $num ) {
    ?>
    <tr>
    <td>
      <?php echo $items[$num]['name']; ?>
    </td>
    <td>
      <?php echo '$' . number_format($items[$num]['price']);?>
    </td>
    <td id="remove">
      <button name='delete' onclick='deleteItem(<?php echo $num; ?>)'
      value='<?php echo $num; ?>'>Remove</button><br/>
    </td>
  </tr>

  <?php
    // calculate total
    $total += $items[$num]['price'];
    } // end foreach

    } else echo "<p>No items in cart</p>";
  ?>
    </table>
    <div class="total">
      <span>Total:</span>
      $<?php echo number_format($total); ?>
    </div>
  </div>
  <button class="button1" ><a href="items.php">Continue Shopping</a></button>
  <button class="button1" id="checkOut"><a href="checkout.php">Check Out</button>
</div>
</div>
<!------------------------ FOOTER --------------------------->
<? require('footer.php'); ?>