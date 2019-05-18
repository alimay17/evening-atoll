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
  <h2 class="pageTitle">Movie Reviews</h2>
  <?php
 $sql = 'SELECT * FROM movie_review AS m Join movie As movie ON m."movie_ID" = movie."movie_ID" JOIN reviewer AS r ON m."reviewer_ID" = r."reviewer_ID"';

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
       <th>Score</th>
       <th>Review</th>
       <th>Reviewed By</th>
     </tr>
      <?php
      foreach ($result as $row) 
      { ?>
        <tr>
          <td>
            <?php echo $row['movie_name']; ?></td>
          <td><?php echo $row['Score']; ?></td>
          <td><?php echo $row['review']; ?></td>
          <td><?php echo $row['reviewer_name']; ?></td>  
     <?php }
    ?>
   </table>
</div>
</div>
</div>

<!----------------------- FOOTER ------------------------->
<? } // end of else
 require('footer.php'); ?>


