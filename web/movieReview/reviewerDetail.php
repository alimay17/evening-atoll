<?php

require('dbAccess.php');

$id = $_POST['reviewer'];

$sql = 'SELECT * FROM reviewer WHERE "reviewer_ID" =' . $id;

$statement = $db->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) { ?>
  <div>
    <h3><?php echo $row['reviewer_name']; ?>  </h3>

<?php }
 $sql = 'SELECT * FROM movie_review AS m Join movie As movie ON m."movie_ID" = movie."movie_ID" JOIN reviewer AS r ON m."reviewer_ID" = r."reviewer_ID" WHERE m."reviewer_ID" =' . $id;

  $statement = $db->query($sql);
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  if($result) {
  ?>
  <table>
     <tr>
       <th>Movie Name</th>
       <th>Score</th>
       <th>Reveiw</th>
     </tr>
  <?php foreach ($result as $row) { ?>
     <tr>
      <td onclick="getMovie(<?php echo $row['movie_ID']; ?>)">
        <?php echo $row['movie_name']; ?></td>
      <td><?php echo $row['Score']; ?></td>
      <td><?php echo $row['review']; ?></td>
    </tr>
      <?php } ?>
  </table>
  <?php } // end if($result) ?>