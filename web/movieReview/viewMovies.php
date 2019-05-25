<?php
/****************************************
 * View all movies page
 ***************************************/
session_start();
$PageTitle = "Browse Movies";
require('header.php'); 

// database access
require('dbAccess.php');
$db = getDatabase();
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
<div id="message">
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
  <div id="main">
  <p>Click on a Movie Title to view full description and reviews.</p>
   <table>
     <tr>
       <th>Movie Title</th>
       <th>Year Released</th>
       <th>Number of Reviews</th>
       <th>Actions</th>
     </tr>
      <?php
      // display QUERY results as table
      foreach ($result as $row) 
      { 
        $movie = $row['movie_ID'];
        $name = $row['movie_name'];
        ?>
        <tr>
          <td class="link" onclick="getMovie(<?php echo $movie; ?>)">
            <?php echo $name; ?></td>
          <td><?php echo $row['movie_year']; ?></td>
          <td><?php
            // QUERY for review count
            $sqlCount = 'SELECT COUNT("reviewer_ID") FROM movie_review WHERE "movie_ID" = ' . $row['movie_ID'];
            $statement = $db->query($sqlCount);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
              echo $row['count'];
            }?>
          </td>
          <td>
            <a href=# onclick="submitReview('<?php echo $movie; ?>', 1);">
            Review Movie
          </a> 
        </td>

     <?php } // end of display loop?>
   </table>
</div> <!-- end of #main    -->
<?php }  // end of if else.  ?>
</div> <!-- end of #message -->
</div> <!-- end of COL-12   -->
</div> <!-- end of ROW      -->

<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>