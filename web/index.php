<!DOCTYPE html>
<html lang="en-us">
<head>
  <title>AS Homepage</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" type="text/css" href="week02/week02.css"/>
</head>
<body>
   <div class="row">
    <div class="col-12, header">
      <h1>Alderan Government</h1>
      <img src="week02/images/logo.png" alt="Logo"
    style="height:100px; width:100px;"/>
    </div>
   </div>
   <div class="row">
     <div class="col-12, flex">
      <div class="menuItem">
       <h4>Core Policies</h4>
       <ul>
         <li>Weapons & Self Defence</li>
         <li>Environment</li>
       </ul>
      </div>
      <div class="menuItem">
       <h4>Ministers</h4>
      </div>
      <div class="menuItem">
       <h4><a href="assignments.php">CS 313 - Assignments</a></h4>
      </div>
     </div>
   </div>
  
   <div class="row">
     <div class="col-3">
       <h2>Issues</h2>
       <div class="list">
         <ul>
           <li>Privy Council Appointments</li>
           <li>902nd Annual Royal Athletic Games</li>
           <li>Alderan Galactic Senate Delegates</li>
           <li>Royal Succession Laws</li>
           <li>Trade Union Mining Contracts</li>
         </ul>
       </div><hr/>
       <h2>Court Proceedings</h2>
       <div class="list">
         <h4>Court held every 4th day<br/> from nonce to tierce</h4>
         <ol>
           <li>Grievance Hearings</li>
           <li>Agriculture Settlements</li>
           <li>Academic Recognition</li>
           <li>Emigration Hearings</li>
           <li>Development Presentations</li>
         </ul>
       </div>
     </div>
  
    <div class="col-9">
      <h2>Current Family</h2>
      <div class="Gallery, row">
      <div class="pic, col-4">
        <h3>Her Majesty Breah Organa</h3>
        <img src="week02/images/monMothma.png"/>
      </div>

      <div class="pic, col-4">
        <h3>His Majesty Bail Organa</h3>
        <img src="week02/images/bailOrgana.png"/>
      </div>

      <div class="pic, col-4">
        <h3>The Princess Leia Organa</h3>
        <img src="week02/images/princessLeia.png"/>
      </div>
      </div>

      <h2>The Royal House of Alderan</h2>
      <div class="flex">
        <p>
          Lineage
        </p>
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