<?php
/*****************************************
 * Form validation for checkout function
 * source: W3 Schools
 *****************************************/
session_start();

  $nameErr = $addressErr = $cityStateErr = $zipErr = "";
  $name = $address = $cityState = $zip = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }
    
  if (empty($_POST["cityState"])) {
  } else {
    $cityState = test_input($_POST["cityState"]);

  }

  if (empty($_POST["zip"])) {
    $zipErr = "Zip Code is required";
  } else {
    $zip = test_input($_POST["zip"]);

  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>