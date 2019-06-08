<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Reviewer Details. Gets and displays selected reviewer
 **********************************************************/
session_start();

// initial page setup
$PageTitle = "Reviewer Detail";
require('header.php'); 
require('dbAccess/dbCalls.php');

// get users review count
$id = $_GET['user']; 
$result = getUserReviewCount($id);
foreach ($result as $row) { 
  $count = $row['count'];
}

// get user details 
$result = getUserDetail($id);
foreach ($result as $row) { 
  $userName = $row['user_name'];
  $time = $row['to_char'];
} 

// display results
if($result) { ?>
<div class="row">
<div class="col-12">
  <!----------------------- MENU ------------------------>
  <div class="menu">
  <h2 class="inst">Reviewer Details</h2>
    <a href="viewReviewers.php">
      <div class="menuItem">BROWSE REVIEWERS</div></a>
    <a href="viewMovies.php">
      <div class="menuItem">BROWSE MOVIES</div></a>
    <a href="search.php">
      <div class="menuItem">SEARCH</div></a>
  </div> 
  <!----------------------- USER DETAILS ------------------------>
  <h2 class="detail"><?php echo $userName; ?> </h2>
  <span class="message"> member since <?php echo $time;?></span>
  <span class="message1">Movies Reviewed: <?php echo $count; ?> </span>

  <!----------------------- REVIEWS TABLE ------------------------>
  <p>Reviews - Sorted by Score</p>
  <table>
    <tr>
      <th>Movie Name</th>
      <th class="num">Score</th>
      <th>Reveiw</th>
    </tr> <?php 
  foreach ($result as $row) {
    $movieID = $row['movie_ID'];
    $movieName = $row['movie_name'];
    $movieReview = $row['review'];
    $movieScore = $row['Score'] 
  ?>
    <tr>
      <!-- Movie names as links  -->
      <td><a href="movieDetail.php?movie=<?php echo $movieID; ?>">
         <?php echo $movieName; ?></a></td>
      <td class="num"><?php echo $movieScore; ?></td>
      <td><?php echo $movieReview; ?></td>
    </tr>
  <?php } // end reviews list ?>
  </table>
</div>
</div>
<?php } // end if user details ?>

  <!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>