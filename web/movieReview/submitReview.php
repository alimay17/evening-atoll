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

       // if user is in db and get add review sql
    if(!$user = getUser($userName)) {
      $user = getNewUser($userName, $userEmail);
    }
    // if user doesn't exist add new user before getting add review sql

    $result = insertReview($movieId, $user, $movieScore, $movieReview);
    if($result){
      
      header("Location: movieDetail.php?movie=" . $_SESSION['movie']);
    }
  }
  else {
    echo "Unable to submit Review<br/>";
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
<h2 class="pageTitle">Review Movie</h2>
<p>This feature is under construction, some functionality might be broken.</p>
<div class="row">
  <div class="col-12">
    <?php 
      //if($result = $addReview->fetchAll(PDO::FETCH_ASSOC)){
        //require('viewMovies.php');
      //}
    ?>
    <div>
<!-------------------- REVIEW FORM ----------------------->
  <form method="post" onsubmit="return validateReview()"
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

        <span>Overall Score</span>
        <input type="number" name="score"/>
        <span class="error" id="scoreError">
          * <?php echo $scoreErr;?></span><br/>

        <span>Your Review:</span>
        <textarea name="movie_review"></textarea>
        <span class="error" id="reviewError">
          * <?php echo $reviewErr;?></span><br/>

        <input type="submit" value="Submit Review" name="submit_review"/>
        <input type="reset" value="Reset Form" name="reset"/>
      </form>
    </div>
  </div>
</div>
<!-------------------- BACK LINK ----------------------->
<a href="viewMovies.php">Return to Browse</a>