<?php
/****************************************
 * Search Results page
 ***************************************/
$PageTitle = "Search Results";
require('header.php');

// database Access
require('dbCalls.php');
?>
<!------------------------ BODY -------------------------->
<div class="row">
  <div class="col-12">
  <h2>Seach Results</h2>
    <?php

  // get user input for QUERY
  $movieTitle = filter_var($_POST['movieTitle'], FILTER_SANITIZE_STRING);
  if($movieTitle) {

    // check if search is good
    $result = search($movieTitle);
    // if no results
    if(!$result) {
      echo "No results found</br>";
    }
    // display search results
    else { ?>
      <div id="message">
        <p>Click on a movie title to view full details.</p>
        <table>
          <tr>
            <th>Movie Name</th>
            <th>Year Released</th>
            <th>Number of Reviews</th>
           </tr>
        <?php
          // display QUERY results as table
          foreach ($result as $row) 
          { $movie = $row['movie_ID'];
            $name = $row['movie_name'];
            $year = $row['movie_year'];
            ?>
            <tr>
              <td><a href="movieDetail.php?movie=<?php echo $movie; ?>">
                <?php echo $name; ?></a></td>
              <td><?php echo $year; ?></td>
              <td><?php
                // QUERY for review count
                $result1 = getReviewCount($row['movie_ID']);
                foreach ($result1 as $row) {echo $row['count']; }?>
              </td>
           <?php } // end of display loop?>
         </table>
      </div> 
<?php } // end of else of if($results) 
} // end of if($movieTitle)
else { echo "<p>Please enter a search Term</p><br/>"; } ?>
<div>
  <?php require("search.php"); ?>
</div>
</div><!-- end of column  -->
</div><!-- end of row -->
<!----------------------- FOOTER ------------------------->
<?php require("footer.php"); ?>