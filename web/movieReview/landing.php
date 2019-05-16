<?php
session_start();
$pageTitle = "Movie Review";
require('header.php'); 
//require('dbAccess.php');
?>

<!------------------------ MENU -------------------------->

<div class="row">
<!------------------------ BODY -------------------------->
<div class="col-12">
  <h2 class="pageTitle">Please select an option</h2>
  <div>
    <ul>
      <li>View Reviewed Movies</li>
      <li>Review a movie</li>
      <li>Submit movie for review</li>
    </ul>
  </div>

</div>
</div>

<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>