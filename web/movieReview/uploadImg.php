<?php
  $targetDir = "images/";
  $targetFile = $targetDir . basename($_FILES['movie_img']['name']);
  $uploadOk = 1;

  if($imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION))) {

  if(file_exists($targetFile)) {
    echo "Sorry, duplicate image<br/>";
    $uploadOk = 0;
  }

  if($_FILES['movie_image']['size'] > 500000) {
    echo "File to large<br/>";
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, & PNG files are allowed.<br/>";
    $uploadOk = 0;
  } 


  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["movie_img"]["tmp_name"], $targetFile)) {
      echo "The file ". basename( $_FILES["movie_img"]["name"]). " has been uploaded.<br/>";
    } else {
      echo "Sorry, there was an error uploading your file.>br/>";
    }
    $movieImg = $targetFile;
  }
}
else $movieImg = "images/default.png";

?>

