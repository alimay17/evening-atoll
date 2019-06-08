<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Landing Page with links to all other pages and functionality
 **********************************************************/
require('header.php'); 
$PageTitle = "Movie Review Home";

?>
  <!----------------------- MENU ------------------------>
<div class="row">
<div class="col-12">
  <div class="menu">
  <h2 class="inst">Pick an Option:</h2>
    <!-- Link List -->
    <a href="viewMovies.php"><div class="menuItem">BROWSE MOVIES</div></a>
    <a href="viewReviewers.php"><div class="menuItem">BROWSE REVIEWERS</div></a>

    <!-- If logged in option -->
    <?php if($_SESSION['loggedIn'] == true) { ?>
      <a href="submitMovie.php"><div class="menuItem">ADD NEW MOVIE</div></a>
    <?php } ?>
  </div>
  <!------------------------ SEARCH -------------------------->
  <?php require("search.php"); ?>
</div>
</div>
<!------------------------- FOOTER ------------------------->
<? require('footer.php'); ?>