<?php
/****************************************
 * View all movies page
 ***************************************/
session_start();
$PageTitle = "Browse Reviewers";
require('header.php'); 
require('dbAccess.php');
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <h2 class="pageTitle">View Reviewers</h2>
<?php
// QUERY to get all reviewers
$sql = 'SELECT * FROM reviewer';
$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

// display if there are any results of query
if(!$result) {
  echo "No results found</br>";
}
else {?>
<!------------------- DISPLAY TABLE --------------------->
  <div id="message">
  <p>Click on a name to view full reviews.</p>
    <table>
      <tr>
       <th>Name</th>
       <th>Number of Reviews</th>
      </tr>
      <?php
      // display QUERY results as table
      foreach ($result as $row) 
      { ?>
        <tr>
          <td onclick="getReviewer(<?php echo $row['reviewer_ID']; ?>)">
            <?php echo $row['reviewer_name']; ?></td>
          <td><?php 
            // QUERY to get number of reviews of each reviewer
            $sqlCount = 'SELECT COUNT("reviewer_ID") FROM movie_review WHERE "reviewer_ID" = ' . $row['reviewer_ID'];
            $statement = $db->query($sqlCount);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
              echo $row['count']; } ?>
            </td>
      <?php } // end of display loop ?>
    </table>
  </div>
  <a href="viewReviewers.php">Return to Full List</a>
</div><!-- end of column  -->
</div><!-- end of row -->
<!----------------------- FOOTER ------------------------->
<? } // end of if else
 require('footer.php'); ?>