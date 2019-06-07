<?php
/********************************************
 * Gets and displays selected reviewer details
 *******************************************/
session_start();
$PageTitle = "Reviewer Detail";
require('header.php'); 
require('dbCalls.php');

// get reviewer id for QUERY
$id = $_GET['user'];

// get review count
$result = getUserReviewCount($id);
foreach ($result as $row) { 
  $count = $row['count'];
}

// get user details
$result = getUserDetail($id);
foreach ($result as $row) { 
  $userName = $row['user_name'];
}  

// display as list with links on movie name
if($result) { ?>
  <div class="row">
  <div class="col-12">
  <div class="menu">
  <h2 class="inst">Reviewer Details</h2>
    <a href="viewReviewers.php">
      <div class="menuItem">RETURN TO BROWSE</div></a>
  </div> 
  <h2 class="detail"><?php echo $userName; ?> </h2>
  <h4 class="message1">Movies Reviewed: <?php echo $count; ?> </h4>
  <p>Sorted by Score</p>
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
      <td><a href="movieDetail.php?movie=<?php echo $movieID; ?>">
         <?php echo $movieName; ?></a></td>
      <td class="num"><?php echo $movieScore; ?></td>
      <td><?php echo $movieReview; ?></td>
    </tr>
<?php } ?>
  </table>
  </div>
  </div>
  <?php } // end if($result) ?>

  <!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>