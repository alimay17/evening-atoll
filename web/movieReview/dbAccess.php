<?php
/*******************************
 * Code to access the database
 * First block is local
 * Second is Heroku
 ******************************/
try
{
  $user = 'alimay';
  $db = new PDO('pgsql:host=localhost;dbname=cs313', $user);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>