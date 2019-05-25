<?php
  // set movie variable
  $movie_ID = $_POST['movie'];
?>

<!------------------------ BODY -------------------------->
<h2 class="pageTitle">Review Movie</h2>
<p>This feature is under construction. Check back soon for functionality.</p>
<div class="row">
  <div class="col-6">
    <div>
<!-------------------- REVIEW FORM ----------------------->
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
    instructions, and messages
  </div>
</div>
<!-------------------- BACK LINK ----------------------->
<a href="viewMovies.php">Return to Browse</a>