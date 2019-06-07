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
  <div class="pageTitle">
    <h2>Browse Movies</h2>
  </div>
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
  <p>Movies are listed alphabetically</p>
  <p>Click on a Movie Title to view full description and reviews.</p>
   <table>
     <tr>
       <th>Movie Title</th>
       <th>Description</th>
       <th class="num">Year Released</th>
       <th class="num">Number of Reviews</th>
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
          <td class="mTitle">
            <a class="movie" href="movieDetail.php?movie=<?php echo $movie; ?>">
            <?php echo $name; ?></a></td>
          <td><?php echo $desc; ?></td>
          <td class="num"><?php echo $year; ?></td>
          <td class="num"><?php
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
</div> <!-- end of COL-12   -->
</div> <!-- end of ROW      -->

<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>

