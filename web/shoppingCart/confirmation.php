<?php
/****************************************
 * Displays items purchased 
 * and order confirmation message
 **************************************/
session_start();
// Confirmation message
?>
  <h3>Thank you for your order</h3>
  <p>You will be contacted when your items
  are ready for delivery</p>
<div>
<?php 
// Purchased items display
require('cartItems.php');
$total = 0;
foreach ( $_SESSION['cart'] as $num ) { ?>
<tr>
  <td>
    Item: <?php echo $items[$num]['name']; ?>
  </td>
</tr>
<?php
    $total += $items[$num]['price'];
} // end foreach
?><br/>
Total: $<?php echo number_format($total); ?>
</div>

<?php
// destroy session and reset variables
session_destroy();
$_SESSION["cart"] = array();
?>
