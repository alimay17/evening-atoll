<?php
/*****************************************
 * Form validation for checkout function
 * source: W3 Schools
 *****************************************/
session_start();

// variables to track data
$nameErr = $imgErr = $yearErr = $descErr = "";
$movieName = $movieImg = $movieYear = $movieDesc = "";

// track if form is valid
$formvalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST[movie_name])) {
    $nameErr = "Movie Name is required";
    $formvalid = false;
  } else {
    $movieName = testString($_POST["movie_name"]);
    $formvalid = true;
  }

  if(empty($_POST[movie_img])) {
    $movieImg = "Image is required";
    $formvalid = false;
  } else {
    $movieImage = $_POST["movie_img"];
    $formvalid = true;

  }
    
  if(empty($_POST[movie_year])) {
    $yearErr = "Release Year is required";
    $formvalid = false;
  } else {
    $movieYear = testNumber($_POST["movie_year"]);
    $formvalid = true;

  }

  if (empty($_POST[movie_desc])) {
    $descErr = "Movie Description is required";
    $formvalid = false;
  } else {
    $movieDesc = testString($_POST["movie_desc"]);
  }
}

/*****************************************
 * test input for unknow characters
 *****************************************/
function testString($data) {

  $clearData = filter_var($data, FILTER_SANITIZE_STRING);
  echo "sanitized $clearData <br/>";
  return $clearData;
}

/*****************************************
 * test input for unknow characters
 *****************************************/
function testNumber($data) {

  $clearData = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
  echo "sanitized $clearData <br/>";
  return $clearData;
}
?>