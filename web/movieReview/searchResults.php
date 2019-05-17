<?php
  require("header.php");
?>
<div>
  <a href="landing.php">Movie Review Home</a><br/>
  <div><br/>
    <?php require("search.php"); ?>
  </div>
  <h2>Seach Results</h2>
</div>
  <?php
  if(isset($_POST['submit'])) {
    if(isset(($_GET['go']))) {
      require("dbAccess.php");

      $movieTitle = $_POST['movieTitle'];
      //echo $movieTitle . '<br/>';
      if(!$movieTitle) {
        echo "No results found</br>";
      }else {
        $sql = 'SELECT * FROM movie_review AS m Join movie As movie ON m."movie_ID" = movie."movie_ID" JOIN reviewer AS r ON m."reviewer_ID" = r."reviewer_ID"';

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
          //echo ' Review: ' . $row["review"] . '<br/>';
          //echo 'Reviewer: ' . $row['reviewer_name'] . '<br/>';
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