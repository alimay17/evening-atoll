<?php
  // set movie variable
  session_start();
  require('dbInsert.php');
  $movieId = $_SESSION['movie'];    
  if(isset($_POST[movie_review]) && isset($_POST[score]) 
    && isset($_POST[user_name]) && isset($_POST[user_email])) {

     $userName = sanitizeData($_POST[user_name]);
     $userEmail = filter_var($_POST[user_email], FILTER_SANITIZE_EMAIL);
     $movieReview = sanitizeData($_POST[movie_review]);
     $movieScore = $_POST[score]; 

       // if user is in db add review
    if(!$user = getUser($userName)) {
      // if user doesn't exist add new user before adding review
      $user = getNewUser($userName, $userEmail);
    }

    $result = insertReview($movieId, $user, $movieScore, $movieReview);
    if($result){
      $_SESSION['message'] = "Thank you for your review";
      header("Location: movieDetail.php?movie=" . $_SESSION['movie']);
    }
    // if user has already reviewed that movie
    else{
      $_SESSION['message'] = "You have already reviewed this movie.";
      header("Location: movieDetail.php?movie=" . $_SESSION['movie']);
    } 
  }
  

/*******************************************
 * a simple function to santize string input
 ********************************************/
function sanitizeData($data) {
  $clearData = filter_var($data, FILTER_SANITIZE_STRING);
  return $clearData;
}
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <h2 class="pageTitle">Review Movie</h2>
  <p>Please be polite and G rated with your comments.</p>
    <?php 
      //if($result = $addReview->fetchAll(PDO::FETCH_ASSOC)){
        //require('viewMovies.php');
      //}
    ?>
  <div>
<!-------------------- REVIEW FORM ----------------------->
  <form id="movieReview" method="post" onsubmit="return validateReview()"
   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <span class="message">All fields are required</span><br/>
    <span>Name:</span>
    <input type="text" name="user_name"/>
    <span class="error" id="userError">
      * <?php echo $userErr;?></span><br/>

    <span>Email:</span>
    <input type="email" name="user_email"/>
    <span class="error" id="emailError">
      * <?php echo $emailErr;?></span><br/>

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