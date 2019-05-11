<?php 
/*************************************************
 * Deletes a specific item from the shopping cart
 *************************************************/
session_start();

  if (false !== $key = array_search($_POST['item'], $_SESSION['cart'])) {
      unset($_SESSION['cart'][$key]);
      echo "Item removed";
  }
  else echo "Unable to remove item";

?>