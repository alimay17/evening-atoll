<?php

require('dbAccess.php');

$id = $_POST['movie'];


$sql = 'SELECT * FROM movie WHERE "movie_ID" = ' . $id;

$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) { ?>
<div>
  <h3><?php echo $row['movie_name']; ?>  </h3>
  <img src="<?php echo $row['movie_img']; ?>"/><br/>
  <p> Released on: <?php echo $row['movie_date']; ?></p>
  <p><?php echo $row['movie_desc']; ?></p>

<?php }
 $sql = 'SELECT * FROM movie_review AS m Join movie As movie ON m."movie_ID" = movie."movie_ID" JOIN reviewer AS r ON m."reviewer_ID" = r."reviewer_ID" WHERE m."movie_ID" =' . $id;

  $statement = $db->query($sql);
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
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
      <td><?php echo $row['reviewer_name']; ?></td>
    </tr>
      <?php } ?>
  </table>
  <?php } // end if($result) ?>
</div>
      
