<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Universal header for site
 **********************************************************/
 session_start(); ?>

<!DOCTYPE html>
<html lang="en-us">
<head>
  <!-- Set Title based on different pages -->
<title>
  <?= isset($PageTitle) ? $PageTitle : "Idaho Reviews Hollywood"?>
</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="UTF-8"/>

  <!--Stylesheets -->
  <link rel="stylesheet" type="text/css" href="support/movieReview.css"/>
  <link rel="stylesheet" type="text/css" href="../movieReview.css"/>
  <link rel="stylesheet" type="text/css" href="../grid.css"/>
  
  <!--Javascript & jQuery -->
  <script type="text/javascript" src="support/movieReview.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- if no internet <script src="../jquery-3.3.1.min.js"></script> -->
</head>
<body>
  <!-- Site heading -->
<div class="row">
<div class="col-12">
  <div class="header">
    <h1>Idaho Reviews Hollywood</h1>
    <p>movies reviewed by intellegent people</p>
    <a class="home" href="landing.php"><div class="menuItem">HOME</div></a>

    <!-- if logged in option -->
    <?php if($_SESSION['loggedIn'] == true) { ?>
      <a class="home" href="logout.php" > 
        <div class="menuItem">SIGN OUT</div></a>
        <a class="home" 
        href="reviewerDetail.php?user=<?php echo $_SESSION['user']?>">
        <div class="menuItem">ACCOUNT</div></a>
  <?php } else { ?>

    <!-- login button-->
    <a class="home" href="login.php">
        <div class="menuItem">SIGN IN</div></a>
    <?php } ?>
  </div> <!-- End .header -->
</div> <!-- End col -->
</div> <!-- End row-->