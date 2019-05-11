<?php 
session_start();


  if (false !== $key = array_search($_POST['itemId'], $_SESSION['cart'])) {
      unset($_SESSION['cart'][$key]);
      echo "Item removed";
  }
  else echo "Unable to remove item";

?>