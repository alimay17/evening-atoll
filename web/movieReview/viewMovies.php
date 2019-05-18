<?php
/****************************************
 * View all movies page
 ***************************************/
session_start();
$pageTitle = "Movie Review";
require('header.php'); 
require('dbAccess.php');
require('search.php');
?>

<!------------------------ MENU -------------------------->
<div class="row">
<!------------------------ BODY -------------------------->
<div class="col-12">
  <h2 class="pageTitle">View Movies</h2>

<?php
 $sql = 'SELECT * FROM movie_review AS m Join movie As movie ON m."movie_ID" = movie."movie_ID" JOIN reviewer AS r ON m."reviewer_ID" = r."reviewer_ID"';

 $sql = 'SELECT * FROM movie';

$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(!$result) {
  echo "No results found</br>";
}
else {?>
  <div id="message">
   <table>
     <tr>
       <th>Movie Name</th>
       <th>Date Released</th>
     </tr>
      <?php
      foreach ($result as $row) 
      { ?>

        <tr>
          <td onclick="getMovie(<?php echo $row['movie_ID']; ?>)">
            <?php echo $row['movie_name']; ?></td>
          <td><?php echo $row['movie_date']; ?></td>
        
     <?php }
    ?>
   </table>
</div>
  <a href="viewMovies.php">Return to Full List</a>
</div>

<!----------------------- FOOTER ------------------------->
<? } // end of else
 require('footer.php'); ?>