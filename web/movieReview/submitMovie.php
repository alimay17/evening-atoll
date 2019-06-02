<?php
/****************************************
 * Submit movie for review page
 ***************************************/
session_start();
$PageTitle = "Submit Movie";
require('header.php'); 
require("dbAccess.php");
$db = getDatabase();
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <h2 class="pageTitle">Submit Movie for Review</h2>
  <p>This page is under construction, some functionality might be broken.</p>
</div>
</div>
<div class="row">
  <div class="col-6">
    <div>
      <form method="post" 
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>Movie Name:</span>
        <input type="text" name="movie_name"/></br>
        <span>Movie Image:</span>
        <input type="text" name="movie_img"/></br>
        <span>Movie Release Year:</span>
        <input type="number" name="movie_year"/></br>
        <span>Movie Description:</span>
        <textarea name="movie_desc"></textarea></br>
        <input type="submit" value="Submit Movie" name="submit_movie"/>
        <input type="reset" value="Reset Form" name="reset" onclick="$('#response').html('');"/>
      </form>
    </div>
  </div>
  <div class="col-6">
    <div id="message">
  <?php

    $validStmt = setData();
    if($validStmt){
      $validStmt->execute();
      if($result = $validStmt->fetchAll(PDO::FETCH_ASSOC)) {
        foreach($result as $row) {
          $newId = $row['movie_ID'];
        }
        echo "Movie Succesfully added</b>"; ?>
        <p class="link" onclick="getMovie(<?php echo $newId; ?>)">
        Click here to review movie</p> 
    <?php
      }
    }
  
    function setData() {

      $db1 = getDatabase();

      $stmt = $db1->prepare("INSERT INTO movie (movie_name, movie_img, movie_year, movie_desc) VALUES(:movie_name, :movie_img, :movie_year, :movie_desc) RETURNING " . '"movie_ID"');

      if(isset($_POST[movie_name]))
      {
        $movieName = sanitizeData($_POST[movie_name]);
        $stmt->bindParam(':movie_name', $movieName);
      }
      if(isset($_POST[movie_img]))
      {
        $movieImage = sanitizeData($_POST[movie_img]);
        $movieImage = "images/default.png"; // just for testing
        $stmt->bindParam(':movie_img', $movieImage);
      }
      if(isset($_POST[movie_year]))
      {
        $movieYear = $_POST[movie_year];
        $stmt->bindParam(':movie_year', $movieYear);
      }
      if(isset($_POST[movie_desc]))
      {
        $movieDesc = sanitizeData($_POST[movie_desc]);
        $stmt->bindParam(':movie_desc', $movieDesc);
      }

      $validMovie = $db1->prepare('SELECT "movie_ID", movie_name FROM movie WHERE "movie_name" ILIKE ' .  "'$movieName'");
      $validMovie->execute();

      if($result = $validMovie->fetchAll(PDO::FETCH_ASSOC)){
      foreach ($result as $row) { 
        echo "Movie already exists</b>"; ?>
        <p class="link" onclick="getMovie(<?php echo $row['movie_ID']; ?>)">
        <?php echo $row['movie_name']; ?></p>
    
      <?php  
      }
      return false;
    }
      return $stmt;
    }

function sanitizeData($data) {
 $clearData = filter_var($data, FILTER_SANITIZE_STRING);
 //echo "sanitized $clearData <br/>";
 return $clearData;

}

?>
    </div>
  </div>
</div>

<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>
