<!DOCTYPE html>
<!-- Universal header for Movie Review Website -->
<html lang="en-us">
<head>
<title>
  <?= isset($PageTitle) ? $PageTitle : "Movie Reviews"?>
</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="UTF-8"/>

  <!--Stylesheets -->
  <link rel="stylesheet" type="text/css" href="movieReview.css"/>
  <link rel="stylesheet" type="text/css" href="../grid.css"/>
  
  <!--Javascript & jQuery -->
  <script src="movieReview.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script src="../jquery-3.3.1.min.js"></script>
</head>
<body>
  <!-- Site header -->
<div class="row">
    <div class="col-12">
      <div class="header">
        <h1>Classic Movie Reviews</h1>
      </div>
        <a href="landing.php">Movie Review Home</a><br/>
    </div>
  </div>