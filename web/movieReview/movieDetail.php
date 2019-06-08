<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Movie Detail. Gets and displays selected movie
 **********************************************************/

// header, session, and page setup
session_start();
$PageTitle = "Movie Detail";
require('header.php'); 
require('support/dbCalls.php'); ?>
<div class="row">
<div class="col-12">
<?php

// get movie_ID for sql query
$id = $_GET['movie'];

// set session for reveiw function
$_SESSION['movie'] = $id;

// if is redirect from review page
if($_SESSION['message']){
  echo "<span class='message'>$_SESSION[message]</span>";
  unset($_SESSION['message']);
}

// get and display movie details
$result = getDetail($id);
foreach ($result as $row) { 
  $movieName = $row['movie_name'];
  $movieImg = $row['movie_img'];
  $movieYear = $row['movie_year'];
  $movieDesc = $row['movie_desc'];
} ?>
  <div class="menu">
    <!-- Menu Items -->
  <h2 class="inst">Movie Details</h2>
    <a href="viewMovies.php">
      <div class="menuItem">RETURN TO BROWSE</div></a>
    <a href="searchResults.php">
      <div class="menuItem">SEARCH</div></a>
  </div> <!--END OF .MENU-->

  <!-- Movie Details -->
<div class="detail">
<h2 class="detail"><?php echo $movieName; ?></h2>
  <img src="<?php echo $movieImg; ?>" alt="Movie Poster"/><br/>
  <p><strong>Released In:</strong> <?php echo $movieYear; ?></p>
  <p><strong>Description:</strong><br/>
    <?php echo $movieDesc; ?>
  </p>
  </div> <!--END OF .DETAIL -->

<?php
// get and display any reveiws of movie
  $result = getReviews($id);
  if($result) {
  ?>
  <div class="review">
     <!-- If logged in display review button -->
    <?php if($_SESSION['loggedIn'] == true) { ?>
    <p id="review">Reviews - Sorted by score
      <a class="submitR"
     href="#review" onclick="submitReview(<?php echo $id; ?>, 2)">
      Review Movie</a></p>
  <?php }

    // if not logged in display sign in button 
    else { ?>
    <p id="review">Reviews - Sorted by score
    <a class="submitR" href="login.php?movie=<?php echo $id; ?>">
    Sign In to Review</a></p> <?php } ?>

  <!-- Review table -->
  <table>
     <tr>
       <th class="num">Score</th>
       <th>Review</th>
       <th>Reviewed By</th>
     </tr>
  <?php foreach ($result as $row) { 
        $score = $row['Score'];
        $review = $row['review'];
        $userID = $row['user_ID'];
        $userName = $row['user_name'];
    ?>
     <tr>
      <td class="num"><?php echo $score; ?></td>
      <td><?php echo $review; ?></td>
      <td><a href="reviewerDetail.php?user=<?php echo $userID; ?>">
        <?php echo $userName; ?></a></td>
    </tr>
      <?php } ?>
  </table>
  <?php } // end of results display
  
  // if no reviews 
  else { ?>
     
    <!-- If logged in display review button -->
    <?php if($_SESSION['loggedIn'] == true) { ?>
    <p id="review">No reveiws yet - Be the first: 
    <a class="submitR" href="#review" 
      onclick="submitReview(<?php echo $id; ?>)"> Review Movie</a></p>
  <?php } 

  // if not logged in display sign in button 
  else { ?>
    <p id="review">No reveiws yet - Be the first: 
    <a class="submitR" href="login.php?movie=<?php echo $id; ?>">Sign In</a>
    <?php } ?></p>
  <?php } // end of if no reviews ?>

</div> <!--END OF #REVIEW-->
</div> <!--END OF .COL-12 -->
</div> <!--END OF .ROW -->
      
<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>