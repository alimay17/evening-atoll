<?php
/****************************************
 * Search Results page
 ***************************************/
$PageTitle = "Search Results";
require('header.php');

// database Access
require("dbAccess.php");
$db = getDatabase();
?>
<!------------------------ BODY -------------------------->
<div class="row">
  <div class="col-12">
  <h2>Seach Results</h2>
    <?php
  // Check if search is good?
  if(isset($_POST['submit'])) {
    if(isset(($_GET['go']))) {

      // get user input for QUERY
      $movieTitle = $_POST['movieTitle'];
      
      // check if is valid input
      if(!$movieTitle) {
        echo "No results found</br>";
      }
      else {
        // QUERY using user input for search
        $sql = 'SELECT * FROM movie WHERE "movie_name" ILIKE ' . "'%$movieTitle%'";
        $statement = $db->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // if no results
        if(!$result) {
          echo "No results found</br>";
        }

        // display search results
        else { ?>
        <div id="message">
        <p>Click on a Movie to view full description and reviews.</p>
         <table>
           <tr>
             <th>Movie Name</th>
             <th>Description</th>
             <th>Number of Reviews</th>
           </tr>
            <?php
            // display QUERY results as table
            foreach ($result as $row) 
            { ?>
              <tr>
                <td class="link" onclick="getMovie(<?php echo $row['movie_ID']; ?>)">
                  <?php echo $row['movie_name']; ?></td>
                <td><?php echo $row['movie_desc']; ?></td>
                <td><?php
                  // QUERY for review count
                  $sqlCount = 'SELECT COUNT("reviewer_ID") FROM movie_review WHERE "movie_ID" = ' . $row['movie_ID'];
                  $statement = $db->query($sqlCount);
                  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($result as $row) {
                    echo $row['count'];
                  }?>
                </td>
           <?php } // end of display loop?>
         </table>
      </div> 
<?php } // end of else of if($results) 
  } // end of else of if($movieTitle)
} // end if(GO)
  else { echo "<p>Please enter a search query</p><br/>"; }
} // end of if(submit)
  ?>
  <div>
    <?php require("search.php"); ?>
  </div>
</div><!-- end of column  -->
</div><!-- end of row -->
  <?php require("footer.php"); ?>