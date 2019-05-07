<!DOCTYPE html>
<html lang="en-us">
<head>
<title>
  <?= isset($PageTitle) ? $PageTitle : "School Bus Clearing House"?>
</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="UTF-8"/>

  <link rel="stylesheet" type="text/css" href="shopping.css"/>
  <link rel="stylesheet" type="text/css" href="../grid.css"/>

  <!--For icons -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  
  <script src="shopping.js"></script>
  <script src="../jquery-3.3.1.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
</head>
<body onload="displayData()">