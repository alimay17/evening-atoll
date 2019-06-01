<?php
  require("dbAccess.php");
  $db = getDatabase();
  
  // get data from form

  $stmt = $db->prepare("INSERT INTO movie (movie_name, movie_img, movie_year, movie_desc) VALUES(:movie_name, :movie_img, :movie_year, :movie_desc)");


  if(isset($_POST[movie_name]))
  {
    $movieName = sanitizeData($_POST[movie_name]);
  } 
  if(isset($_POST[movie_img]))
  {
    $movieImage = sanitizeData($_POST[movie_img]);

  }
  if(isset($_POST[movie_year]))
  {
    $movieYear = $_POST[movie_year];
  }
  if(isset($_POST[movie_desc]))
  {
    $movieDesc = sanitizeData($_POST[movie_desc]);
  }

   echo "$movieName <br/> $movieImage <br/> $movieYear </br> $movieDesc";
   
    $stmt->bindParam(':movie_name', $movieName);
    $stmt->bindParam(':movie_img', $movieImage);
    $stmt->bindParam(':movie_year', $movieYear);
    $stmt->bindParam(':movie_desc', $movieDesc);
  

    //if (!$stmt->execute()) {
      echo 'error executing statement: ' . $stmt->error;
  }

  function sanitizeData($data) {
   $clearData = filter_var($data, FILTER_SANITIZE_STRING);
   //echo "sanitized $clearData <br/>";
   return $clearData;

  }
?>