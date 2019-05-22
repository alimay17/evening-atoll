<?php
  require('dbAccess.php');
  $movie_ID = $_POST['movie'];
?>

<!------------------------ BODY -------------------------->
<h2 class="pageTitle">Submit Movie for Review</h2>
<p>This page is under construction. Check back soon for functionality.</p>
<div class="row">
  <div class="col-6">
    <div>
      <form>
        <span class="message">All fields are required</span><br/>
        <span>Name:</span>
        <input type="text" name="reviewer_name"/></br>
        <span>Email:</span>
        <input type="text" name="reviewer_email"/></br>
        <span>Your Review:</span>
        <textarea name="movie_review"></textarea></br>
        <input type="submit" value="Submit Review" name="submit_review"/>
        <input type="reset" value="Reset Form" name="reset"/>
      </form>
    </div>
  </div>
  <div class="col-6">
    Display for completed submission,<br/>
    instructions, and messages.
  </div>
</div>
  <a href="#main" onclick="getMovie(<?php echo $movie_ID ?>)">Back</a>