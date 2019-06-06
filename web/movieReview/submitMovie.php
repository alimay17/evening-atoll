<?php
/****************************************
 * Submit movie for review page
 ***************************************/
session_start();
$PageTitle = "Submit Movie";
require('header.php'); 
require('dbInsert.php');
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <h2 class="pageTitle">Submit Movie for Review</h2>
  <p>This page is under construction, some functionality might be broken.</p>
</div>
</div>
<div class="row">
  <div class="col-12">
    <div>
      <p>* Required field</p>
    <form method="post" onsubmit="return validate()"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>Movie Name:</span>
        <input type="text" name="movie_name"/>
        <span class="error" id="nameError">
          * <?php echo $nameErr;?></span><br/>


        <span>Movie Image:</span>
        <input type="text" name="movie_img"/> <br/>
      <!--  <span class="error"><?php echo $imgErr;?></span><br/> -->
 

        <span>Movie Release Year:</span>
        <input type="number" name="movie_year"/> 
        <span class="error" id="yearError">
          * <?php echo $yearErr;?></span><br/>
  

        <span>Movie Description:</span>
        <textarea name="movie_desc"></textarea> 
        <span class="error" id="descError">
          * <?php echo $descErr;?></span><br/> 


        <input type="submit" id="submit" class="button"
        value="Submit Movie" name="submit_movie"/>

        <input type="reset" value="Reset Form" name="reset" class="button"
        onclick="$('.error').text('*');"/>
      </form>
    </div>
  </div>
  <?php


  require('validate.php');
    if($formvalid){
      if(!checkValidMovie($movieName)) {
      $result = insertMovie($movieName, $movieImg, $movieYear, $movieDesc);
      foreach($result as $row) {
        $newId = $row['movie_ID'];
        }
        echo "<h3>Movie Succesfully added</h3>"; ?>
        <a href="movieDetail.php?movie=<?php echo $newId; ?>">
          Click here to add a review.</a> <?php
      }
    } ?>

    </div>
  </div>
</div>

<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>
