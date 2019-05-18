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
  <h2 class="pageTitle">View Reviewers</h2>
<?php
$sql = 'SELECT * FROM movie_review AS mr Join movie As m ON mr."movie_ID" = m."movie_ID" JOIN reviewer AS r ON mr."reviewer_ID" = r."reviewer_ID"';

$sql = 'SELECT * FROM reviewer';

$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(!$result) {
  echo "No results found</br>";
}
else {?>
  <div id="message">
  <p>Click on a name to view full reviews.</p>
   <table>
     <tr>
       <th>Name</th>
       <th>Number of Reviews</th>
     </tr>
      <?php
      foreach ($result as $row) 
      { ?>
        <tr>
          <td onclick="getReviewer(<?php echo $row['reviewer_ID']; ?>)">
            <?php echo $row['reviewer_name']; ?></td>
          <td><?php 
            $sqlCount = 'SELECT COUNT("reviewer_ID") FROM movie_review WHERE "reviewer_ID" = ' . $row['reviewer_ID'];
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
  <a href="viewReviewers.php">Return to Full List</a>
</div>

<!----------------------- FOOTER ------------------------->
<? } // end of else
 require('footer.php'); ?>