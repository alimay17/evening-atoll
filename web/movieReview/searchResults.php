<?php
/****************************************
 * Search Results page
 ***************************************/
session_start();
$PageTitle = "Search Results";
require('header.php'); 
?>
<!------------------------ BODY -------------------------->
<div>
  <h2>Seach Results</h2>
  <div>
    <?php require("search.php"); ?>
  </div>
</div><br/>
  <?php
  if(isset($_POST['submit'])) {
    if(isset(($_GET['go']))) {
      require("dbAccess.php");

      $movieTitle = $_POST['movieTitle'];
      //echo $movieTitle . '<br/>';
      if(!$movieTitle) {
        echo "No results found</br>";
      }else {
        $sql = 'SELECT * FROM movie WHERE "movie_name" ILIKE ' . "'%$movieTitle%'";
        $statement = $db->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!$result) {
          echo "No results found</br>";
        }
        else {
        foreach ($result as $row) 
        {
          echo 'Movie Name: ' . $row['movie_name'];
          echo '<br/>';
        }
      }
    } 
  }
}
  else {
    echo "<p>Please enter a search query</p><br/>";
  }  
  
  require("footer.php");
?>