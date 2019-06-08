<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Submit Movie for Review
 **********************************************************/
session_start();

// page setup
$PageTitle = "Submit Movie";
require('header.php'); 
require('support/dbInsert.php');
require('support/validate.php');

// check if user input is good
$movieName = filterString($_POST["movie_name"]);
$movieDesc = filterString($_POST["movie_desc"]);
$movieYear = $_POST["movie_year"];

if($movieName && $movieDesc && $movieYear){

  // upload image function
  require('support/uploadImg.php');

  // if movie isn't a duplicate add to db
  if(checkValidMovie($movieName) && $uploadOk == 1) {
    $result = insertMovie($movieName, $movieImg, $movieYear, $movieDesc);

    // get new movie_id for redirect link
    foreach($result as $row) {
      $newId = $row['movie_ID'];
    } ?>
    <p class='message'>Movie Succesfully added</p>
    <a href="movieDetail.php?movie=<?php echo $newId; ?>">
      Click here to add a review.</a> <?php
  }
  // if error in adding movie
  else echo "<p class='message'>Unable to add movie. Please try again.</p>";
} 
?>

<!------------------------ PAGE TITLE -------------------------->
<div class="row">
<div class="col-12">
  <div class="pageTitle">
    <h2>Submit Movie for Review</h2>
  </div>

  <!------------------------ FORM -------------------------->
  <div>
  <?php if($_SESSION['errorMessage']) {
      echo $_SESSION['errorMessage'];
      unset($_SESSION['errorMessage']);
    } ?>
    <p class="message">* Required field</p>
    <form id="movieInput" method="post" onsubmit="return validateMovie()" 
      enctype="multipart/form-data"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <span>Movie Name:</span>
      <input type="text" name="movie_name"/>
      <span class="error" id="nameError">
        * <?php echo $nameErr;?></span><br/>

      <span>Movie Image (optional):</span>
      <label for="file">Select Image</label>
      <input type="file" name="movie_img" id="file" class="inputFile"/>

      <span>Movie Release Year:</span>
      <input type="number" name="movie_year" min="1900" max="2020" step="1"/> 
      <span class="error" id="yearError">
        * <?php echo $yearErr;?></span><br/>
  
      <span>Movie Description:</span><span class="error" id="descError">
      * <?php echo $descErr;?></span><br/> 
      <textarea name="movie_desc"></textarea> 
 
      <input type="submit" id="submit" class="button"
      value="Submit Movie" name="submit_movie"/>

       <input type="reset" value="Reset Form" name="reset" class="button"
        onclick="$('.error').text('*');"/>
    </form>
  </div>
</div><!-- end of column  -->
</div><!-- end of row -->
<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>