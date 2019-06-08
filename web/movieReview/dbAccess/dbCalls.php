<?php
require('dbAccess.php');

/*********************************************
 * Returns a list of name, year and unique id
 * for all db entries
 *********************************************/
function getMovieList() {
  $db = getDatabase();
  try {
  $stmt = $db->prepare(
    'SELECT movie_name, movie_desc, movie_year, "movie_ID" 
    FROM movie 
    ORDER BY movie_name'
  );
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

/*********************************************
 * Returns specific details for selected movie
 *********************************************/
function getDetail($movieID) {
  $db = getDatabase();
  try {
    $stmt = $db->prepare(
      'SELECT * from movie WHERE "movie_ID" = ' ."$movieID"
    );
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

/*********************************************
 * Returns a list of all reviewers in db
 *********************************************/
function getUsers() {
  $db = getDatabase();
  try {
    $stmt = $db->prepare(
      'SELECT "user_ID", user_name FROM mv_user 
      JOIN movie_review AS r ON "user_ID" = r."reviewer_ID" 
      ORDER BY user_name'
    );
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

/*********************************************
 * Returns specific details for selected user
 *********************************************/
function getUserDetail($userID) {
  $db = getDatabase();
  try {
    $stmt = $db->prepare(
    'SELECT movie."movie_ID", movie_name, "Score", review, user_name, 
    TO_CHAR(created_at,'. "'Mon-YYYY'" . ')
    FROM movie_review AS m 
    Join movie As movie ON m."movie_ID" = movie."movie_ID" 
    JOIN mv_user AS r ON m."reviewer_ID" = r."user_ID" 
    WHERE m."reviewer_ID" =' . "$userID"
  );
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(!$result){
      $stmt = $db->prepare('SELECT user_name, TO_CHAR(created_at,'. "'Mon-YYYY'" . ') 
      FROM mv_user
      where "user_ID" =' . "$userID");
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
  }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

/*********************************************
 * Returns count of number of reviews for 
 * specific movie
 *********************************************/
function getReviewCount ($movieID) {
  $db = getDatabase();
  try {
  $stmt = $db->prepare('SELECT COUNT ("reviewer_ID") FROM movie_review WHERE "movie_ID" =' . "$movieID");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

/*********************************************
 * Returns count of number of reviews for 
 * specific user
 *********************************************/
function getUserReviewCount($userID) {
  $db = getDatabase();
  try {
  $stmt = $db->prepare('SELECT COUNT ("reviewer_ID") FROM movie_review WHERE "reviewer_ID" =' . "$userID");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

/*********************************************
 * Returns count of number of reviews for 
 * specific movie
 *********************************************/
function getReviews($movieID) {
  $db = getDatabase();
  try {
    
    $stmt = $db->prepare(
      'SELECT "Score", review, "user_ID", "user_name" FROM movie_review AS m 
      Join movie As movie ON m."movie_ID" = movie."movie_ID" 
      JOIN mv_user AS r ON m."reviewer_ID" = r."user_ID" 
      WHERE m."movie_ID" =' . "$movieID" .
      'ORDER BY "Score" DESC'
    );
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

/*********************************************
 * Returns specific details for selected movie
 *********************************************/
function search($searchTerm) {
  $db = getDatabase();
  try{
    $stmt = $db->prepare('SELECT "movie_ID", movie_name, movie_year FROM movie WHERE "movie_name" ILIKE ' . "'%$searchTerm%' 
    ORDER BY movie_name");
   $stmt->execute();
    return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  }catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}
?>