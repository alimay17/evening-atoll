<?php
/****************************************
 * Landing Page for Movie Review Website
 * Provides links to all other pages and 
 * Functionalities
 ***************************************/
session_start();
$PageTitle = "Movie Review Home";
require('header.php'); 
?>

<!------------------------ MENU -------------------------->

<div class="row">
<!------------------------ BODY -------------------------->
<div class="col-12">
  <h2 class="pageTitle">Please select an option</h2>
  <div>
    <!-- Link List -->
    <ul>
      <li><a href="viewMovies.php">Browse Movie List</a></li>
      <li><a href="viewReviewers.php">Browse Reviewers</a></li>
      <li><a href="submitMovie.php">Submit movie for review</a></li>
    </ul>
    <?php require("search.php"); ?>
  </div>
</div>
</div>

<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>