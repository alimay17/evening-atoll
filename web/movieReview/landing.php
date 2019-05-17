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
      <li><a href="viewMovies.php">View Reviewed Movies</a></li>
      <li><a href="viewMovies.php">Full Movie List</a></li>
      <li><a href="submitReview.php">Review a movie<a</li>
      <li><a href="submitMovie.php">Submit movie for review</a></li>
    </ul>
    <?php require("search.php"); ?>
  </div>
</div>
</div>

<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>