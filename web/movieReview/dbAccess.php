<?php
try
{
  $user = 'alimay';
  $password = '8ach15Be$t';
  $db = new PDO('pgsql:host=localhost;dbname=cs313', $user, $password);

  // this line makes PDO give us an exception when there are problems,
  // and can be very helpful in debugging! (But you would likely want
  // to disable it for production environments.)
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  foreach ($db->query('SELECT * FROM movie_review AS m
  Join movie As movie
  ON m."movie_ID" = movie."movie_ID" JOIN reviewer AS r ON m."reviewer_ID" = r."reviewer_ID";') as $row)
{
  echo 'Movie Name: ' . $row['movie_name'];
  echo '<br/>';
  echo ' Review: ' . $row["review"] . '<br/>';
  echo 'Reviewer: ' . $row['reviewer_name'] . '<br/>';
}

}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>