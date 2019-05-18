<?php
/****************************************
 * View all movies page
 ***************************************/
session_start();
$pageTitle = "Movie Review";
require('header.php'); 
require('dbAccess.php');
?>

<!------------------------ MENU -------------------------->
<div class="row">
<!------------------------ BODY -------------------------->
<div class="col-12">
  <h2 class="pageTitle">View Movies</h2>
  <?php require('search.php'); ?>
<?php
$sql = 'SELECT * FROM movie_review AS mr Join movie As m ON mr."movie_ID" = m."movie_ID" JOIN reviewer AS r ON mr."reviewer_ID" = r."reviewer_ID"';

$sql = 'SELECT * FROM movie';

$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(!$result) {
  echo "No results found</br>";
}
else {?>
  <div id="message">
  <p>Click on a Movie to view full description and reviews.</p>
   <table>
     <tr>
       <th>Movie Name</th>
       <th>Date Released</th>
       <th>Number of Reviews</th>
     </tr>
      <?php
      foreach ($result as $row) 
      { ?>
        <tr>
          <td onclick="getMovie(<?php echo $row['movie_ID']; ?>)">
            <?php echo $row['movie_name']; ?></td>
          <td><?php echo $row['movie_date']; ?></td>
          <td><?php 
            $sqlCount = 'SELECT COUNT("reviewer_ID") FROM movie_review WHERE "movie_ID" = ' . $row['movie_ID'];
            $statement = $db->query($sqlCount);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
              echo $row['count'];
            }
          ?></td>
        
     <?php }
    ?>
   </table>
</div>
  <a href="viewMovies.php">Return to Full List</a>
</div>

<!----------------------- FOOTER ------------------------->
<? } // end of else
 require('footer.php'); ?>