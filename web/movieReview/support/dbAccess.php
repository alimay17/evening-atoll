<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Code to access the database: 
* First block is local, Second is Heroku
 **********************************************************/

function getDatabase(){
// Local db access
$db = null;

/*try
{
  $user = 'alimay';
  $db = new PDO('pgsql:host=localhost;dbname=cs313', $user);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}*/



//Heroku db access
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

return $db;
}
?>