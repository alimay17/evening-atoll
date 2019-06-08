<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Search Results. 
 **********************************************************/
require('header.php');
$PageTitle = "Search Results";

// database Access
require('support/dbCalls.php');
?>
<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <!----------------------- MENU ------------------------>
  <div class="menu">
    <h2 class="inst">Search Results</h2>
      <!-- If Logged in display add Movie button -->
    <?php if($_SESSION['loggedIn'] == true) { ?>
      <a href="submitMovie.php"><div class="menuItem">ADD NEW MOVIE</div></a>
    <?php } ?>
    <a href="viewMovies.php"><div class="menuItem">RETURN TO BROWSE</div></a>
  </div> <!-- end .menu -->
    
<?php
  // get user input
  $movieTitle = filter_var($_POST['movieTitle'], FILTER_SANITIZE_STRING);

   // check if search is good
  if($movieTitle) {
    $result = search($movieTitle);

    // if no results display error message
    if(!$result) {
      echo "<p class='message'>No results found</p>";
    }

    // else display search results as table
  else { ?>
  <div id="message">
    <p class="message">Click on a movie title to view full details.</p>
    <table>
      <tr>
        <th>Movie Name</th>
        <th class="num">Year Released</th>
        <th class="num">Number of Reviews</th>
      </tr>
      <?php
        // get results data
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

          // get reviews count and add to table
          $result1 = getReviewCount($row['movie_ID']);
          foreach ($result1 as $row) {echo $row['count']; }?>
        </td>
        <?php } // end of display loop?>
      </tr>
    </table>
  </div> 
<?php } // end of results display
} // end of if search is good

// if nothing in search box 
else { echo "<p class='message'>Please enter a search Term</p>"; } ?>

<!----------------------- SEARCH BOX ------------------------>
<div>
  <?php require("search.php"); ?>
</div>
</div><!-- end of column  -->
</div><!-- end of row -->
<!----------------------- FOOTER ------------------------->
<?php require("footer.php"); ?>