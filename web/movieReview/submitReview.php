<?php
  // set movie variable
  session_start();
  require('dbAccess.php');

  // if user is in db and get add review sql
  if($user = getUser()) {
    $addReview = setReview($user);
  }
  // if user doesn't exist add new user before getting add review sql
  else {
    $newUser = getNewUser();
    $addReview = setReview($newUser);
  }
  
  // add review to db
  $addReview->execute();
  if($result = $addReview->fetchAll(PDO::FETCH_ASSOC)){
    header("Refresh:0; url=viewMovies.php?movie=" . $_SESSION['movie']);
  }

/*******************************************
 * gets existing user from db
 * returns user_ID
 ********************************************/
function getUser() {
  // db access
  $db = getDatabase();

  //sanitize user input
  if(isset($_POST[user_name]))
  {
    $userName = sanitizeData($_POST[user_name]);
  }

  // check for user in DB
  $validUser = $db->prepare('SELECT "user_ID", "user_name" FROM mv_user WHERE "user_name" ILIKE ' .  "'$userName'");
  $validUser->execute();

  if($result = $validUser->fetchAll(PDO::FETCH_ASSOC)){
  foreach ($result as $row) { 
    $existingUser = $row[user_ID];
    }
  // return user_ID
  return $existingUser;
  }
  // if unable to find user, return and report
  else return false;
}

/*******************************************
 * adds a new user to db
 * returns new user_ID
 ********************************************/
function getNewUser() {
  // db access
  $db = getDatabase();

  // add new user sql statement
  $stmt = $db->prepare('INSERT INTO mv_user ("user_name", "user_email") VALUES(:user_name, :user_email) RETURNING ' . '"user_ID"');

  // sanitize and bind user input
  if(isset($_POST[user_name]))
  {
    $userName = sanitizeData($_POST[user_name]);
    $stmt->bindParam(':user_name', $userName);
  }
  if(isset($_POST[user_email]))
  {
    $userEmail = sanitizeData($_POST[user_email]);
    $stmt->bindParam(':user_email', $userEmail);
  }

  // send statement to db
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row) {
    // return new user_ID
    return $row[user_ID];
  }
}

/*******************************************
 * prepares and returns a sql statement 
 * to update the movie_user db table.
 * passed a user ID as a parameter
 ********************************************/
function setReview($user) {
  // open db
  $db2 = getDatabase();

  // prepare sql
  $stmt = $db2->prepare('INSERT INTO movie_review ("movie_ID", "reviewer_ID", review, "Score") VALUES(:movie_ID, :reviewer_ID, :review, :Score) RETURNING ' . '"reviewer_ID"');


  // sanitize and bind user input
  $stmt->bindParam('movie_ID', $_SESSION['movie']);
  $stmt->bindParam('reviewer_ID', $user);

  if(isset($_POST[movie_review]))
  {
    $movieReview = sanitizeData($_POST[movie_review]);
    $stmt->bindParam(':review', $movieReview);
  }
  if(isset($_POST[score])) 
  {
    $movieScore = $_POST[score]; 
    $stmt->bindParam(':Score', $movieScore);
  }
  // return sql command
  return $stmt;
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
  <div class="col-6">
    <?php 
      if($result = $addReview->fetchAll(PDO::FETCH_ASSOC)){
        require('viewMovies.php');
      }
    ?>
    <div>
<!-------------------- REVIEW FORM ----------------------->
  <form method="post" 
   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span class="message">All fields are required</span><br/>
        <span>Name:</span>
        <input type="text" name="user_name"/></br>
        <span>Email:</span>
        <input type="text" name="user_email"/></br>
        <span>Overall Score</span>
        <input type="number" name="score"/></br>
        <span>Your Review:</span>
        <textarea name="movie_review"></textarea></br>
        <input type="submit" value="Submit Review" name="submit_review"/>
        <input type="reset" value="Reset Form" name="reset"/>
      </form>
    </div>
  </div>
  <div class="col-6"> <div id="message">
  </div>
</div>
<!-------------------- BACK LINK ----------------------->
<a href="viewMovies.php">Return to Browse</a>