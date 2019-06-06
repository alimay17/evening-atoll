<?php
/*****************************************
 * Form validation for checkout function
 * source: W3 Schools
 *****************************************/

// variables to track data
$movieName = $movieImg = $movieYear = $movieDesc = "";

// track if form is valid
$formvalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if($_POST["movie_name"] && $_POST["movie_year"] && $_POST["movie_desc"]) {

    $movieName = testString($_POST["movie_name"]);
    echo "Movie Name: $movieName<br/>";

    $movieImg = "images/default.png";
    echo "Movie Image: $movieImg<br/>";

    $movieYear = testNumber($_POST["movie_year"]);
    echo "Movie Year: $movieYear<br/>";

    $movieDesc = testString($_POST["movie_desc"]);
    echo "Movie Desc: $movieDesc<br/>";

    $formvalid = true;
  }
}

/*****************************************
 * test input for unknow characters
 *****************************************/
function testString($data) {
  $clearData = filter_var($data, FILTER_SANITIZE_STRING);
  return $clearData;
}

/*****************************************
 * test input for unknow characters
 *****************************************/
function testNumber($data) {
  $clearData = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
  return $clearData;
}
?>