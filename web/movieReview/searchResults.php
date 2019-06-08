<?php
/****************************************
 * Search Results page
 ***************************************/
require('header.php');
$PageTitle = "Search Results";

// database Access
require('dbAccess/dbCalls.php');
?>
<!------------------------ BODY -------------------------->
<div class="row">
  <div class="col-12">
  <div class="menu">
    <h2 class="inst">Search Results</h2>
    <a href="submitMovie.php">
      <div class="menuItem">ADD NEW MOVIE</div></a>
      <a href="viewMovies.php">
      <div class="menuItem">RETURN TO BROWSE</div></a>

  </div>
    <?php

  // get user input for QUERY
  $movieTitle = filter_var($_POST['movieTitle'], FILTER_SANITIZE_STRING);
  if($movieTitle) {

    // check if search is good
    $result = search($movieTitle);
    // if no results
    if(!$result) {
      echo "<p class='message'>No results found</p>";
    }
    // display search results
    else { ?>
      <div id="message">
        <p class="message">
          Click on a movie title to view full details.</p>
        <table>
          <tr>
            <th>Movie Name</th>
            <th class="num">Year Released</th>
            <th class="num">Number of Reviews</th>
           </tr>
        <?php
          // display QUERY results as table
          foreach ($result as $row) 
          { $movie = $row['movie_ID'];
            $name = $row['movie_name'];
            $year = $row['movie_year'];
            ?>
            <tr>
              <td class="mTitle">
                <a class="movie" href="movieDetail.php?movie=<?php echo $movie; ?>">
                <?php echo $name; ?></a></td>
              <td class="num"><?php echo $year; ?></td>
              <td class="num"><?php
                // QUERY for review count
                $result1 = getReviewCount($row['movie_ID']);
                foreach ($result1 as $row) {echo $row['count']; }?>
              </td>
           <?php } // end of display loop?>
         </table>
      </div> 
<?php } // end of else of if($results) 
} // end of if($movieTitle)
else { echo "<p class='message'>Please enter a search Term</p>"; } ?>
<div>
  <?php require("search.php"); ?>
</div>
</div><!-- end of column  -->
</div><!-- end of row -->
<!----------------------- FOOTER ------------------------->
<?php require("footer.php"); ?>