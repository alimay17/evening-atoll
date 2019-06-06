<?php
/******************************************
 * Gets and displays selected movie details
 *****************************************/
// header, session, and page setup
session_start();
$PageTitle = "Movie Detail";
require('header.php'); 
require('dbCalls.php');

// get movie_ID for sql query
$id = $_GET['movie'];

// set session for reveiw function
$_SESSION['movie'] = $id;


// get and display movie details
$result = getDetail($id);
foreach ($result as $row) { ?>
<div>
  <h3><?php echo $row['movie_name']; ?>  </h3>
  <img src="<?php echo $row['movie_img']; ?>" alt="Movie Poster"/><br/>
  <p> Released on: <?php echo $row['movie_year']; ?></p>
  <h4>Description</h4>
  <p><?php echo $row['movie_desc']; ?></p>
  <div id="review">
<?php }

  // get and display reveiws
  $result = getReviews($id);
  if($result) {
  ?>
  <h3>Reviews</h3>
  <table>
     <tr>
       <th>Score</th>
       <th>Reveiw</th>
       <th>Reviewed By</th>
     </tr>
  <?php foreach ($result as $row) { 
        $score = $row['Score'];
        $review = $row['review'];
        $userID = $row['user_ID'];
        $userName = $row['user_name'];
    ?>
     <tr>
      <td><?php echo $score; ?></td>
      <td><?php echo $review; ?></td>
      <td><a href="reviewerDetail.php?user=<?php echo $userID; ?>">
        <?php echo $userName; ?></a></td>
    </tr>
      <?php } ?>
  </table>
  <?php } // end if($result) ?>
  <a href="viewMovies.php">Return to Browse</a>
  <a href="#review" onclick="submitReview(<?php echo $id; ?>, 2)">Review Movie</a>
  </div>
</div>
      
<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>