<?php
/****************************************
 * View all movies page
 ***************************************/
session_start();
$PageTitle = "Browse Movies";
require('header.php'); 
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
<div id="message">
<?php
    if(isset($_GET[movie])){
      require("movieDetail.php");
    }
else{
      require('dbAccess.php');
      $db = getDatabase(); ?>
  <h2 class="pageTitle">View Movies</h2>
  <?php require('search.php'); ?>
<?php

// QUERY to display all movies
try {
  $sql = 'SELECT * FROM movie';
  $statement = $db->query($sql);
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
}catch (\PDOException $e) {
  echo $e->getMessage();
}

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
            try {
              $sqlCount = 'SELECT COUNT("reviewer_ID") FROM movie_review WHERE "movie_ID" = ' . $row['movie_ID'];
              $statement = $db->query($sqlCount);
            }catch (\PDOException $e) {
              echo $e->getMessage();
            }
            // display reviews count
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
              echo $row['count'];
            }?>
          </td>

     <?php } // end of display loop?>
   </table>
</div> <!-- end of #main    -->
<?php } // end of query if else 
    } ?> 
</div> <!-- end of #message -->
</div> <!-- end of COL-12   -->
</div> <!-- end of ROW      -->

<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>

