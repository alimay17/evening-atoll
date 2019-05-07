<?php
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
    <div id="dataTable"></div>
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