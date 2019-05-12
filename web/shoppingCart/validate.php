<?php
/*****************************************
 * Form validation for checkout function
 * source: W3 Schools
 *****************************************/
session_start();

  $nameErr = $addressErr = $cityStateErr = $zipErr = "";
  $name = $address = $cityState = $zip = "";
  $formvalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $formvalid = false;
  } else {
    $name = test_input($_POST["name"]);
    $formvalid = true;
  }
  
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
    $formvalid = false;
  } else {
    $address = test_input($_POST["address"]);
    $formvalid = true;
  }
    
  if (empty($_POST["cityState"])) {
    $cityStateErr = "City & State is required";
    $formvalid = false;
  } else {
    $cityState = test_input($_POST["cityState"]);
    $formvalid = true;
  }

  if (empty($_POST["zip"])) {
    $zipErr = "Zip Code is required";
    $formvalid = false;
  } else {
    $zip = test_input($_POST["zip"]);
    $formvalid = true;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>