<?php
/****************************************
 * View Movies with reviews
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
</div>
<?php
 $sql = 'SELECT * FROM movie_review AS m Join movie As movie ON m."movie_ID" = movie."movie_ID" JOIN reviewer AS r ON m."reviewer_ID" = r."reviewer_ID"';

$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(!$result) {
  echo "No results found</br>";
}
else {

foreach ($result as $row) 
{
  echo 'Movie Name: ' . $row['movie_name'];
  echo ' Review: ' . $row["review"];
  echo ' Reviewer: ' . $row['reviewer_name'] . '<br/>';
}
}
?>
</div>

<!----------------------- FOOTER ------------------------->
<? require('footer.php'); ?>