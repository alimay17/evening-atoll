<?php
/****************************************
 * Submit movie for review page
 ***************************************/
session_start();
$PageTitle = "Submit Movie";
require('header.php'); 
require('dbInsert.php');

require('validate.php');
if($formvalid){
  require('uploadImg.php');
  if(checkValidMovie($movieName) && $uploadOk == 1) {
    $result = insertMovie($movieName, $movieImg, $movieYear, $movieDesc);
    foreach($result as $row) {
      $newId = $row['movie_ID'];
    }
    echo "<p class='message'>Movie Succesfully added</p>"; ?>
    <a href="movieDetail.php?movie=<?php echo $newId; ?>">
      Click here to add a review.</a> <?php
  }
  else echo "<p class='message'>Unable to add movie. Please try again.</p>";
} 

?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <div class="pageTitle">
    <h2>Submit Movie for Review</h2>
  </div>
    <div>
      <p class="message">* Required field</p>
    <form id="movieInput" method="post" onsubmit="return validate()" 
      enctype="multipart/form-data"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>Movie Name:</span>
        <input type="text" name="movie_name"/>
        <span class="error" id="nameError">
          * <?php echo $nameErr;?></span><br/>

        <span>Movie Image:</span>
        <label for="file">Select Image</label>
        <input type="file" name="movie_img" id="file" class="inputFile"/>

        <span>Movie Release Year:</span>
        <input type="number" name="movie_year"/> 
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
  </div>
    </div>
  </div>
</div>

<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>
