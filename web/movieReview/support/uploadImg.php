<?php
/**********************************************************
* Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Uploads an image and sets $movieImg to filepath
 **********************************************************/

 // set filepath
  $targetDir = "images/";
  $targetFile = $targetDir . basename($_FILES['movie_img']['name']);
  $uploadOk = 1;

  // checks for size, duplicates, and image type
  if($imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION))) {
  if(file_exists($targetFile)) {
    $_SESSION['errorMessage'] = "Duplicate image - not uploaded<br/>";
    $uploadOk = 0;
  }
  if($_FILES['movie_image']['size'] > 500000) {
    echo "File to large<br/>";
    $uploadOk = 0;
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $_SESSION['errorMessage'] = "Sorry, only JPG, JPEG, & PNG files are allowed.<br/>";
    $uploadOk = 0;
  } 

  // if image is good, save to file system.
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["movie_img"]["tmp_name"], $targetFile)) {
      echo "The image ". basename( $_FILES["movie_img"]["name"]). " has been uploaded.<br/>";
    } 
    
    // if error uploading
    else {
      $_SESSION['errorMessage'] = "Sorry, there was an error uploading your file.>br/>";
    }
    $movieImg = $targetFile;
  }
}

// if no image proveided set default
else $movieImg = "images/default.png";

?>

