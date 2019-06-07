<?php
/****************************************
 * Landing Page for Movie Review Website
 * Provides links to all other pages and 
 * Functionality
 ***************************************/
$PageTitle = "Movie Review Home";
require('header.php'); 
?>
<!----------------------- NAV LINKS ------------------------>
<div class="row">
<div class="col-12">
  <div class="menu">
  <h2 class="inst">Pick an Option:</h2>
    <!-- Link List -->
    <a href="viewMovies.php"><div class="menuItem">BROWSE MOVIES</div></a>
    <a href="viewReviewers.php"><div class="menuItem">BROWSE REVIEWERS</div></a>
    <a href="submitMovie.php"><div class="menuItem">ADD NEW MOVIE</div></a>
  </div>
  <!------------------------ SEARCH -------------------------->
  <?php require("search.php"); ?>
</div>
</div>
<!------------------------- FOOTER ------------------------->
<? require('footer.php'); ?>