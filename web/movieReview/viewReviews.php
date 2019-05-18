<?php
/****************************************
 * View Movies with
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

$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(!$result) {
  echo "No results found</br>";
}
else {?>
  <div>
   <table>
     <tr>
       <th>Movie Name</th>
       <th>Description</th>
       <th>Score</th>
       <th>Reveiw</th>
       <th>Reviewed By</th>
     </tr>
      <?php
      foreach ($result as $row) 
      {
        echo "<tr>";
        echo '<td>' . $row['movie_name'] . '</td>';
        echo '<td>' . $row['movie_desc'] . '</td>';
        echo '<td>' . $row['Score'] . '</td>';
        echo '<td>' . $row['review'] . '</td>';
        echo '<td>' . $row['reviewer_name'] . '</td>';
        echo "</tr>";
      }
    ?>
   </table>
</div>
</div>

<!----------------------- FOOTER ------------------------->
<? } // end of else
 require('footer.php'); ?>


