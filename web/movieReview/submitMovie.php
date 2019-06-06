<?php
/****************************************
 * Submit movie for review page
 ***************************************/
session_start();
$PageTitle = "Submit Movie";
require('header.php'); 
require('dbAccess.php');
require('validate.php')
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
        <input type="text" name="movie_name"/><br/>

        <span>Movie Image:</span>
        <input type="text" name="movie_img"/><br/>      

        <span>Movie Release Year:</span>
        <input type="number" name="movie_year"/><br/>

        <span>Movie Description:</span>
        <textarea name="movie_desc"></textarea><br>

        <input type="submit" value="Submit Movie" name="submit_movie"/>
        <input type="reset" value="Reset Form" name="reset" onclick="$('#response').html('');"/>
      </form>
    </div>
  </div>
  <div class="col-6">
    <div id="message">
    <span class="error"><?php echo $nameErr;?></span><br/>
    <span class="error"><?php echo $imgErr;?></span><br/>
    <span class="error"><?php echo $yearErr;?></span><br/>
    <span class="error"><?php echo $descErr;?></span><br/>
  <?php


    if($formvalid){
      echo "it works!<br/>";
    }

      /*
      $db1 = getDatabase();
      require('validate.php');

      $stmt = $db1->prepare("INSERT INTO movie (movie_name, movie_img, movie_year, movie_desc) VALUES(:movie_name, :movie_img, :movie_year, :movie_desc) RETURNING " . '"movie_ID"');

      $stmt->bindParam(':movie_name', $movieName);
      $stmt->bindParam(':movie_img', $movieImg);
      $stmt->bindParam(':movie_year', $movieYear);
      $stmt->bindParam(':movie_desc', $movieDesc);

      $validMovie = $db1->prepare('SELECT "movie_ID", movie_name FROM movie WHERE "movie_name" ILIKE ' .  "'$movieName'");
      try {
        $validMovie->execute();
        }catch (\PDOException $e) {
          echo $e->getMessage();
        }

        if($result = $validMovie->fetchAll(PDO::FETCH_ASSOC)){
          foreach ($result as $row) { 
            echo "Movie already exists</b>"; ?>
            <p class="link" onclick="getMovie(<?php echo $row['movie_ID']; ?>)">
            <?php echo $row['movie_name']; ?></p>
        
          <?php 
          }
          try{
            $validStmt->execute();
          }catch (\PDOException $e) {
            echo $e->getMessage();
          }
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
    }*/
      

?>
    </div>
  </div>
</div>

<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>
