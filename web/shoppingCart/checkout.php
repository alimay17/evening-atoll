<?php
session_start();
$pageTitle = "Checkout";
require('header.php'); 
require('validate.php');
?>

<!--------------------- MENU & SIDEBAR ---------------------->
<?php require('menu.php');?>
<div class="row">
  <?php require('sidebar.php');?>
<!-------------------------- BODY --------------------------->
<div class="col-9"> 
  <div id="confirmation">
  <h2>Purchase information</h2>

  <?php require('cartItems.php');
    $total = 0;
    foreach ( $_SESSION['cart'] as $num ) { ?>
    <tr>
      <td>
        Item: <?php echo $items[$num]['name']; ?>
      </td>
      <td>
        Price: <?php echo '$' . number_format($items[$num]['price']);?>
      </td>
    </tr>
  <?php
    $total += $items[$num]['price'];
  } // end foreach  ?>
  Total: $<?php echo number_format($total); ?>

<!-------------------------- FORM --------------------------->
  <p><span class="error">All fields are required</span></p>
  <form method="post" 
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error"><?php echo $nameErr;?></span>
    <br><br>
    Address: <input type="text" name="address" value="<?php echo $address;?>">
    <span class="error"><?php echo $addressErr;?></span>
    <br><br>
    City & State: <input type="text" name="cityState" 
      value="<?php echo $cityState;?>">
    <span class="error"><?php echo $cityStateErr;?></span>
    <br><br>
    Zip Code: <input type="text" name="zip" 
      value="<?php echo $zip;?>">
    <span class="error"><?php echo $zipErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
    <button>Return to Cart</button>
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