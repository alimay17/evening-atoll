<?php
  session_start();

  if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
  }

  if (!in_array($_POST ["item"], $_SESSION['cart'])) {
    // Add new item to cart
    $_SESSION ['cart'][] = $_POST["item"];
    echo "Added to cart";
}
else echo "Already in cart";

?>