<?php
session_start();
$pageTitle = "Checkout";
require('header.php'); 

  $nameErr = $addressErr = $cityStateErr = $zipErr = "";
  $name = $address = $cityState = $zip = "";

  $formvalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    $formvalid = true;
  }
  
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
    $formvalid = false;
  } else {
    $address = test_input($_POST["address"]);
    $formvalid = true;
  }
    
  if (empty($_POST["cityState"])) {
    $cityStateErr = "City and State is required";
    $formvalid = false;
  } else {
    $cityState = test_input($_POST["cityState"]);
    $formvalid = true;
  }

  if (empty($_POST["zip"])) {
    $zipErr = "Zip Code is required";
    $formvalid = false;
  } else {
    $zip = test_input($_POST["zip"]);
    $formvalid = true;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!------------------------ HEADER --------------------------->
<body>
  <div class="row">
    <div class="col-12">
      <div class="header">
        <h1>School Bus Clearing House</h1>
      </div>
    </div>
  </div>
<!------------------------- MENU --------------------------->
<?php require('menu.php');?>
<!----------------------- SIDEBAR -------------------------->
<div class="row">
  <?php require('sidebar.php');?>
<!------------------------- BODY --------------------------->
  <div class="col-9"> 
    <div id="confirmation">
  <h2>Purchase information</h2>

  <?php require('cartItems.php'); ?>

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

  <?php 
  if($formvalid) {
echo '<script type="text/javascript">',
     'checkout();',
     '</script>';
}
?>

  </div>
</div>

<!------------------------ FOOTER --------------------------->
  <div class="row">
    <div class="col-12">
      <div class="footer">
        <? require('footer.php'); ?>
      </div>
    </div>
  </div>

</body>
</html>