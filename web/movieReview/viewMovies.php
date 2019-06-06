<?php
/****************************************
 * View all movies page
 ***************************************/
session_start();
$PageTitle = "Browse Movies";
require('header.php'); 
require('dbCalls.php');
?>

<!------------------------ BODY -------------------------->
<div class="row">
<div class="col-12">
<div id="message">
  <?php /*
    if(isset($_SESSION[movie])){
      require("movieDetail.php");
    }
    else { */
       ?>
  <h2 class="pageTitle">View Movies</h2>
  <?php require('search.php'); ?>
<?php

// get and display list of movies
$result = getMovieList();
if(!$result) {
  echo "No results found</br>";
}
else { ?>
<!------------------- DISPLAY TABLE --------------------->
  <div id="main">
  <p>Click on a Movie Title to view full description and reviews.</p>
   <table>
     <tr>
       <th>Movie Title</th>
       <th>Description</th>
       <th>Year Released</th>
       <th>Number of Reviews</th>
     </tr>
      <?php
      // display QUERY results as table
      foreach ($result as $row) 
      { 
        $movie = $row['movie_ID'];
        $name = $row['movie_name'];
        $desc = $row['movie_desc'];
        $year = $row['movie_year'];
        ?>
        <tr>
          <td><a href="movieDetail.php?movie=<?php echo $movie; ?>">
            <?php echo $name; ?></a></td>
          <td><?php echo $desc; ?></td>
          <td><?php echo $year; ?></td>
          <td><?php
            // get and display review count
            $result = getReviewCount($movie);
            foreach ($result as $row) {
              echo $row['count'];
            } ?>
          </td>

     <?php } // end of display loop?>
   </table>
</div> <!-- end of #main    -->
<?php } // end of query if else 
    //} ?> 
</div> <!-- end of #message -->
</div> <!-- end of COL-12   -->
</div> <!-- end of ROW      -->

<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>

