<!DOCTYPE html>
<html lang="en-us">
<head>
  <title>AS Homepage</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" type="text/css" href="week02/week02.css"/>
  <script src="week02/week02.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <!------------------------ HEADER --------------------------->
<div class="row">
  <div class="col-12, header">
    <h1>An Introduction to Myrna Loy</h1>
  </div>
</div>
  <!------------------------ SIDEBAR -------------------------->
<div class="row">
  <div class="col-4">
    <h2>Actress & Activist</h2>
    <p>
      Born in Helena Montana in 1905, Myrna Loy started out life as a rancher's daughter.
      She entered the film industry in 1925 but her first big break didn't come till 1934 when she was cast opposite William Powell in The Thin Man.
      She appeared in at least 30 films over the course of her film career.
      Throughout her life Myrna Loy was dedicated to helping people. She was an active member of the Red Cross during the war years, and in 1948 became the first Hollywood celebity member of UNESCO.
    </p>

    <h3>My Top 10 Films</h3>
    <div class="list">
      <ol>
        <li>The Thin Man</li>
        <li>To Hot to Handle</li>
        <li>The Bachelor and the Bobby-Soxer</li>
        <li>Cheaper By The Dozen</li>
        <li>I Love You Again</li>
        <li>The Rains Came</li>
        <li>Test Pilot</li>
        <li>The Best Years of Our Lives</li>
        <li>Mr. Blandings Builds His Dream House</li>
        <li>Libeled Lady</li>
      </ol>
    </div>
  </div>
  <!-------------------- PICTURE GALLERY ---------------------->
  <div class="col-8">
    <div class="gallery">
      <img src="week02/images/myrnaLoy02.png" alt="Myrna Loy"/>
      <div class="desc">Mysterious</div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy01.png" alt="Myrna Loy"/>
      <div class="desc">Determined</div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy03.png" alt="Myrna Loy"/>
      <div class="desc">Strong</div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy05.png" alt="Myrna Loy"/>
      <div class="desc">Mischevious</div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy04.png" alt="Myrna Loy"/>
      <div class="desc">Talented</div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy06.png" alt="Myrna Loy"/>
      <div class="desc">Timeless</div>
    </div>
  </div>
</div>

  <?php
    echo "this works from PHP";
  ?>
<div class="row">
  <?php require "footer.php" ?>
</div>
</body>
</html>