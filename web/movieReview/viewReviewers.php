<?php
/**********************************************************
* Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Displays all users in db who have posted a review
 **********************************************************/
$PageTitle = "Browse Reviewers";
require('header.php'); 
require('dbAccess/dbCalls.php');
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
  <div class="pageTitle"><h2>View Reviewers</h2></div>
<?php 

  // search bar
  require("search.php");

  // get list of users
  $result = getUsers();

  // message if no results
  if(!$result) {
    echo "No results found</br>";
  }
else  {?>
<!------------------- DISPLAY TABLE --------------------->
<div id="message">
  <p>Click on a name to view details - sorted alphabetically.</p>
  <table>
    <tr>
      <th>Name</th>
      <th>Number of Reviews</th>
    </tr>
    <?php
    foreach ($result as $row) { 
      $userName = $row['user_name'];
      $userID = $row['user_ID']; ?>
    <tr>
      <td><a href="reviewerDetail.php?user=<?php echo $userID; ?>">
        <?php echo $userName; ?></a></td>
      <td><?php 
      // get count of reveiws
        $result2 = getUserReviewCount($userID);
        foreach ($result2 as $row) { echo $row['count']; } ?>
      </td>
    </tr>
    <?php } // end of display loop ?>
  </table>
</div>
</div><!-- end of column  -->
</div><!-- end of row -->
<!----------------------- FOOTER ------------------------->
<?php } // end of results
 require('footer.php'); ?>