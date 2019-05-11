<?php
session_start(); 

$pageTitle = "Home";
require('header.php');

?>

<!------------------------ HEADER --------------------------->
<div class="row">
  <div class="col-12">
    <div class="header">
      <h1>School Bus Clearing House</h1>
    </div>
    <div>
      <i class="fas fa-shopping-bag"></i>
    </div>
  </div>
</div>
<!------------------------- MENU --------------------------->
<?php require('menu.php');?>
<!------------------------ SIDEBAR -------------------------->
<div class="row">
<?php require('sidebar.php'); ?>
<!---------------------- ITEMS GRID ------------------------->
  <div class="col-10">
    <div id="message"></div>
    <div class="flex" id="items">
      <div class="card">
        <img class='busPic' src='images/bus1.jpg'/>
        <h2>Transit Style 2000 Blue Bird</h2>
        <p class="price">Price: $78,000.</p>
        <p>Sold By: Salem Schools #999</br>
        Mileage: 888323</br>
        Cummings Engine, Camera System, 78 Passenger.<br/> 
        Radiator and Transmission replaced March 2019</p>
        <p><button onclick="addToCart(1)">Add to Cart</button></p>
      </div>
      <div class="card">
        <img class='busPic' src='images/bus1.jpg'/>
        <h2>Standard 1994 Thomas Built</h2>
        <p class="price">Price: $12,000.</p>
        <p>Sold By: First Student</br>
        Mileage: 1002223</br>
        Caterpillar Engine, 72 Passenger.<br/> 
        Not DOT Compliant</p>
        <p><button onclick="addToCart(2)">Add to Cart</button></p>
      </div>
      <div class="card">
        <img class='busPic' src='images/bus1.jpg'/>
        <h2>Standard 2012 Blue Bird</h2>
        <p class="price">Price: $100,000.</p>
        <p>Sold By: Rochester Schools #342</br>
        Mileage: 78999</br>
        Propane Engine, Camera Systems, 72 Passenger.<br/> 
        Full service Oct 2018</p>
        <p><button onclick="addToCart(3)">Add to Cart</button></p>
      </div>
    </div>
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