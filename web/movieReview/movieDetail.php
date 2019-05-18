<?php
/******************************************
 * Gets and displays selected movie details
 *****************************************/
require('dbAccess.php');

// get movie_ID for sql query
$id = $_POST['movie'];

// make first QUERY for movie details
$sql = 'SELECT * FROM movie WHERE "movie_ID" = ' . $id;
$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

// display results
foreach ($result as $row) { ?>
<div>
  <h3><?php echo $row['movie_name']; ?>  </h3>
  <img src="<?php echo $row['movie_img']; ?>" alt="Movie Poster"/><br/>
  <p> Released on: <?php echo $row['movie_year']; ?></p>
  <h4>Description</h4>
  <p><?php echo $row['movie_desc']; ?></p>

<?php }
  // Second QUERY for reviews of Movie
  $sql = 'SELECT * FROM movie_review AS m Join movie As movie ON m."movie_ID" = movie."movie_ID" JOIN reviewer AS r ON m."reviewer_ID" = r."reviewer_ID" WHERE m."movie_ID" =' . $id;

  $statement = $db->query($sql);
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  // display results if any
  if($result) {
  ?>
  <h3>Reviews</h3>
  <table>
     <tr>
       <th>Score</th>
       <th>Reveiw</th>
       <th>Reviewed By</th>
     </tr>
  <?php foreach ($result as $row) { ?>
     <tr>
      <td><?php echo $row['Score']; ?></td>
      <td><?php echo $row['review']; ?></td>
      <td class="link" onclick="getReviewer(<?php echo $row['reviewer_ID']; ?>)">
        <?php echo $row['reviewer_name']; ?></td>
    </tr>
      <?php } ?>
  </table>
  <?php } // end if($result) ?>
  <a href="viewMovies.php">Return to Browse</a>
</div>
      
