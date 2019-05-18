<?php
/****************************************
 * View all movies page
 ***************************************/
session_start();
$PageTitle = "Browse Movies";
require('header.php'); 
require('dbAccess.php');
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <h2 class="pageTitle">View Movies</h2>
  <?php require('search.php'); ?>
<?php

// QUERY to display all movies
$sql = 'SELECT * FROM movie';
$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

// display if there are any results of query
if(!$result) {
  echo "No results found</br>";
}
else {?>
<!------------------- DISPLAY TABLE --------------------->
  <div id="message">
  <p>Click on a Movie to view full description and reviews.</p>
   <table>
     <tr>
       <th>Movie Name</th>
       <th>Date Released</th>
       <th>Number of Reviews</th>
     </tr>
      <?php
      // display QUERY results as table
      foreach ($result as $row) 
      { ?>
        <tr>
          <td onclick="getMovie(<?php echo $row['movie_ID']; ?>)">
            <?php echo $row['movie_name']; ?></td>
          <td><?php echo $row['movie_date']; ?></td>
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
  <a href="viewMovies.php">Return to Full List</a>
</div>

<!----------------------- FOOTER ------------------------->
<? } // end of if else
 require('footer.php'); ?>