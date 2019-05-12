<?php
/****************************************
 * Displays items purchased 
 * and order confirmation message
 **************************************/
session_start();
// Confirmation message
?>
  <h2 class="pageTitle">Thank you for your order</h2>
  <p>You will be contacted when your item(s)
  are ready for delivery</p>
<?php
// destroy session and reset variables
session_destroy();
$_SESSION["cart"] = array();
?>
