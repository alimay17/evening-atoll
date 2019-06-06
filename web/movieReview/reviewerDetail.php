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

// First QUERY for reveiwer details
$result = getUserDetail($id);
// display results
foreach ($result as $row) { 
  $userName = $row['user_name'];
  ?>
<?php }
  
  // Second Query for number of reveiws by reviewer


  // display 2nd query results in table
  // movie_name links to movie details 
  if($result) {
  ?>
  <div>
  <h2>Reviewer: <?php echo $userName; ?> </h2>
  <h4>Movies Reviewed</h4>
  <table>
     <tr>
       <th>Movie Name</th>
       <th>Score</th>
       <th>Reveiw</th>
     </tr>
  <?php foreach ($result as $row) {
      $movieID = $row['movie_ID'];
      $movieName = $row['movie_name'];
      $movieReview = $row['review'];
      $movieScore = $row['Score']
     ?>
     <tr>
     <td><a href="movieDetail.php?movie=<?php echo $movieID; ?>">
         <?php echo $movieName; ?></a></td>
      <td><?php echo $movieScore; ?></td>
      <td><?php echo $movieReview; ?></td>
    </tr>
      <?php } ?>
  </table>
  <a href="viewReviewers.php">Return to Browse</a>
  <?php } // end if($result) ?>

  <!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>