<?php
require('dbAccess.php');

/*********************************************
 * Inserts new movie into DB
 *********************************************/
function insertMovie($movieName, $movieImg, $movieYear, $movieDesc) {

  try {
    $db1 = getDatabase();
    $stmt = $db1->prepare("INSERT 
    INTO movie (movie_name, movie_img, movie_year, movie_desc) 
    VALUES(:movie_name, :movie_img, :movie_year, :movie_desc) RETURNING " . '"movie_ID"');

    $stmt->bindParam(':movie_name', $movieName);
    $stmt->bindParam(':movie_img', $movieImg);
    $stmt->bindParam(':movie_year', $movieYear);
    $stmt->bindParam(':movie_desc', $movieDesc);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

/*********************************************
 * Inserts new review into DB
 *********************************************/
function insertReview($movieId, $user, $movieScore, $movieReview) {
  $db = getDatabase();

  $validUser = $db->prepare('SELECT "reviewer_ID", "movie_ID" FROM movie_review 
  WHERE "reviewer_ID" =' .  "'$user'" . 'AND "movie_ID" = ' . "'$movieId'");
  $validUser->execute();

  if(!$result = $validUser->fetchAll(PDO::FETCH_ASSOC)){
    try{

      $stmt = $db->prepare('INSERT 
      INTO movie_review ("movie_ID", "reviewer_ID", review, "Score") 
      VALUES(:movie_ID, :reviewer_ID, :review, :Score) RETURNING ' . '"reviewer_ID"');

      // sanitize and bind user input
      $stmt->bindParam('movie_ID', $movieId);
      $stmt->bindParam('reviewer_ID', $user);
      $stmt->bindParam(':review', $movieReview);
      $stmt->bindParam(':Score', $movieScore);

      $stmt->execute();
      return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
  else return false;
}


/*******************************************
 * gets existing user from db
 * returns user_ID
 ********************************************/
function getUser($userName) {
  // db access
  $db = getDatabase();

  //sanitize user input

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
function getNewUser($userName, $userEmail) {
  // db access
  $db = getDatabase();

  // add new user sql statement
  $stmt = $db->prepare('INSERT INTO mv_user ("user_name", "user_email") VALUES(:user_name, :user_email) RETURNING ' . '"user_ID"');

  //bind user input
    $stmt->bindParam(':user_name', $userName);
    $stmt->bindParam(':user_email', $userEmail);

  // send statement to db
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row) {
    // return new user_ID
    return $row[user_ID];
  }
}


/*********************************************
 * Checks if a movie is already in the DB
 *********************************************/
function checkValidMovie($input) {
  $db = getDatabase();

  $stmt = $db->prepare('SELECT "movie_ID", movie_name FROM movie 
  WHERE "movie_name" ILIKE ' . "'$input'");

  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) { 
      echo "Movie already exists: "; ?>
      <a href="movieDetail.php?movie=<?php echo $row['movie_ID']; ?>">
            <?php echo $row['movie_name']; ?></a>
    <?php 
    }
    return false;
}


?>