<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Submit Review for movie
 **********************************************************/
session_start();
require('support/dbInsert.php');

// if form is filled out get user input
$movieId = $_SESSION['movie'];    
if(isset($_POST[movie_review]) && isset($_POST[score])) {
  $movieReview = filter_var($_POST[movie_review], FILTER_SANITIZE_STRING);
  $movieScore = $_POST[score]; 
  $user = $_SESSION['user'];

  // insert review to db
  $result = insertReview($movieId, $user, $movieScore, $movieReview);

  // set success or error message
  if($result){
    $_SESSION['message'] = "Thank you for your review";
  }
  else{
      $_SESSION['message'] = "You have already reviewed this movie.";
    }
    // redirect back to movie page. and display message 
    header("Location: movieDetail.php?movie=" . $_SESSION['movie']);
}
?>

<!------------------------ PAGE TITLE -------------------------->
<div class="row">
<div class="col-12">
  <h2 class="pageTitle">Review Movie</h2>
  <p>Please be polite and G rated with your comments.</p>
  <div>
<!-------------------- REVIEW FORM ----------------------->
  <form id="movieReview" method="post" onsubmit="return validateReview()"
   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <span class="message">All fields are required</span><br/>

  <div id="reviewInput">
    <span>Overall Score:</span>
    <input type="number" name="score" 
           min=".5" max="10" step=".5"/>
    <span class="error" id="scoreError">
      * <?php echo $scoreErr;?></span><br/>

    <span>Your Review:</span>
    <span class="error" id="reviewError">
    * <?php echo $reviewErr;?></span><br/>
    <textarea name="movie_review"></textarea>
  </div>
    <input class="button" 
      type="submit" value="Submit Review" name="submit_review"/>
    <input class="button" 
      type="reset" value="Reset Form" name="reset"
      onclick="$('.error').text('*');"/>
  </form>
</div>
</div>
</div>
<!-------------------- BACK LINK ----------------------->
<a href="viewMovies.php">Return to Browse</a>