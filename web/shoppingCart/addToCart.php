<?php
/*****************************
 * Adds items to shopping cart
 *****************************/
  session_start();

  // initialze cart array
  if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
  }

  if (!in_array($_POST ["item"], $_SESSION['cart'])) {
    // Add new item to cart
    $_SESSION ['cart'][] = $_POST["item"];?>
    <div class="callout-header"><?php echo "Item added to cart"; ?></div>
    <span class="closebtn" 
    onclick="this.parentElement.style.display='none'">&times;</span>
<?php
    //echo "Added to cart";
}
else {?> 
  <div class="callout-header"><?php echo "Item already in cart"; ?></div>
  <span class="closebtn" 
    onclick="this.parentElement.style.display='none'">&times;</span>
<?php }?>