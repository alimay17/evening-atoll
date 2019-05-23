<?php
/****************************************
 * Submit movie for review page
 ***************************************/
session_start();
$PageTitle = "Submit Movie";
require('header.php'); 
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <h2 class="pageTitle">Submit Movie for Review</h2>
  <p>This page is under construction. Check back soon for functionality.</p>
</div>
</div>
<div class="row">
  <div class="col-6">
    <div>
      <form>
        <span>Movie Name:</span>
        <input type="text" name="movie_name"/></br>
        <span>Movie Image:</span>
        <input type="text" name="movie_img"/></br>
        <span>Movie Release Year:</span>
        <input type="text" name="movie_year"/></br>
        <span>Movie Description:</span>
        <textarea name="movie_desc"></textarea></br>
        <input type="submit" value="Submit Movie" name="submit_movie"/>
        <input type="reset" value="Reset Form" name="reset"/>
      </form>
    </div>
  </div>
  <div class="col-6">
    Display for completed submission,<br/>
    instructions, and messages.
  </div>
</div>

<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>