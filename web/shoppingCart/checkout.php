<?php
session_start();
$pageTitle = "Checkout";
require('header.php'); 
require('validate.php');
?>

<!-------------------------- MENU --------------------------->
<?php require('menu.php');?>
<div class="row">
<!-------------------------- BODY --------------------------->
<div class="col-12"> 
  <div id="confirmation">
  <h2 class="pageTitle">Purchase information</h2>
  <?php require('cartItems.php');
    $total = 0;
    foreach ( $_SESSION['cart'] as $num ) {
    $total += $items[$num]['price'];
  } ?>
  <div class="total"><span>Total:</span>
    $<?php echo number_format($total); ?></div>
<!-------------------------- FORM --------------------------->
  <p><span class="error">*All fields are required</span></p>
  <form method="post" 
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    
    <span class="formHeading"> Name: </span>
    <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error"><?php echo $nameErr;?></span>
    <br><br>
    <span class="formHeading"> Address: </span>
    <input type="text" name="address" value="<?php echo $address;?>">
    <span class="error"><?php echo $addressErr;?></span>
    <br><br>
    <span class="formHeading"> City & State: </span>
    <input type="text" name="cityState" 
      value="<?php echo $cityState;?>">
    <span class="error"><?php echo $cityStateErr;?></span>
    <br><br>
    <span class="formHeading"> Zip Code: </span>
    <input type="text" name="zip" 
      value="<?php echo $zip;?>">
    <span class="error"><?php echo $zipErr;?></span>
    <br><br>
    <input class="button1" type="submit" name="submit" value="Submit">  
    <button class="button1"><a href="cart.php">Return to Cart</a></button>
  </form>
    </div>
<!--------------------- CONFIRMATION ------------------------>
  <?php 
  if($formvalid) {
    echo '<script type="text/javascript">checkout();</script>';
  }
  ?>
  </div>
</div>
<!------------------------ FOOTER --------------------------->
<? require('footer.php'); ?>