<?php
/****************************************
 * View all movies page
 ***************************************/
$PageTitle = "Browse Reviewers";
require('header.php'); 
require('dbAccess/dbCalls.php');
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <div class="pageTitle">
  <h2>View Reviewers</h2>
  </div>
  <?php require("search.php"); ?>
<?php
// get and display any reviewers
$result = getUsers();
if(!$result) {
  echo "No results found</br>";
}
else {?>
<!------------------- DISPLAY TABLE --------------------->
  <div id="message">
  <p>Click on a name to view details - sorted alphabetically.</p>
    <table>
      <tr>
       <th>Name</th>
       <th>Number of Reviews</th>
      </tr>
      <?php
      // display QUERY results as table
      foreach ($result as $row) 
      { 
        $userName = $row['user_name'];
        $userID = $row['user_ID'];
        ?>
        <tr>
        <td><a href="reviewerDetail.php?user=<?php echo $userID; ?>">
        <?php echo $userName; ?></a></td>
          <td><?php 
            // QUERY to get number of reviews of each reviewer
            $result2 = getUserReviewCount($userID);
            foreach ($result2 as $row) {
              echo $row['count']; } ?>
            </td>
      <?php } // end of display loop ?>
    </table>
  </div>
</div><!-- end of column  -->
</div><!-- end of row -->
<!----------------------- FOOTER ------------------------->
<? } // end of if else
 require('footer.php'); ?>