<?php
// db access
require('dbAccess.php');
$db = getDatabase();

// check if input is valid & set local variable
if(isset($_POST['password'])){
  $password = pg_escape_string($_POST['password']);
}
if(isset($_POST['username'])){
  $username = pg_escape_string($_POST['username']);
}

// hash password
$password_hash = password_hash($password, PASSWORD_BCRYPT);

// prepare statement
$stmt = $db->prepare("INSERT INTO user_data (username, password) 
VALUES(:username, :password) RETURNING " . '"user_id"');

// set parameters
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password_hash);

// execute statement
$stmt->execute();

// redirect user
if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
  foreach ($result as $row) { 
    header("Refresh:0; url=welcome.php?user_id=" . $row['user_id']);
  }
}
?>