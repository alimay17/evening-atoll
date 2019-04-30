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
      Throughout her life Myrna Loy was dedicated to helping people. She was an active member of the Red Cross during the war years, and in 1948 became an active member of UNESCO.
      <em><a href="https://en.wikipedia.org/wiki/Myrna_Loy" target="blank">
        Source</a></em>
    </p>
  <!-------------------------- POLL ---------------------------->
    <div id="poll">
      <h3>Have you heard of Myrna Loy?</h3>
      <form>
        Yes:
        <input type="radio" name="vote" value="0" onclick="getVote(this.value)">
        <br>No:
        <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
      </form>
    </div>
  <!------------------------ FILM LIST ------------------------->
    <div class="list">
    <h3>My Top 10 Films</h3>
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
    <div class="links">
      <h3>External Links</h3>
      <a href="https://www.chicagotribune.com/news/ct-xpm-1993-12-19-9312190012-story.html" target="blank">
      More Reading</a><br/>
      <a href="assignments.php">CS 313 Assignments</a><br/>
      <a href="byui.edu" target="blank">BYU Idaho</a><br/>
      <a href="byui-cs313-19s-04.slack.com" target="blank">
        Class Slack Channel<a/> 
    </div>
  </div>
  <!--------------------- PICTURE GALLERY ----------------------->
  <div class="col-8">
  <h4>Click on the descriptor words to find out more.</h4>
  <button class="button" onclick="showAll()">Show/Hide All</button>
    <div class="flex">
    <div class="gallery">
      <img src="week02/images/myrnaLoy02.png" alt="Myrna Loy""/>
      <div class="desc" onclick="show('01')">Mysterious</div>
      <div class="about" id="01">
        <p>
          Her quiet smile and piercing eyes are iconic in film history. Despite her 4  marriages, she kept her personal life personal. 
        </p>
      </div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy01.png" alt="Myrna Loy"/>
      <div class="desc" onclick="show('02')">Determined</div>
      <div class="about" id="02">
        <p>
          Despite the constant pressure from Hollywood and the media, Myrna never compromised her convictions.
        </p>
      </div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy03.png" alt="Myrna Loy"/>
      <div class="desc" onclick="show('03')">Strong</div>
      <div class="about" id="03">
        <p>
          Close friends with Elenore Roosevelt, Myrna was concerned with the political environment. She was always outspoken in her political views. 
        </p>
      </div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy05.png" alt="Myrna Loy"/>
      <div class="desc" onclick="show('04')">Mischevious</div>
      <div class="about" id="04">
        <p>
          It wasn't until director W.S van Dyke took a chance and cast her in comedic role that her career took off. Myrna was widely acclaimed for her comdedic skills. 
        </p>
      </div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy04.png" alt="Myrna Loy"/>
      <div class="desc" onclick="show('05')">Talented</div>
      <div class="about" id="05">
        <p>
          Myrna had the ability to be convincing in a wide variety of roles from suductive gypsy girls to dedicated housewives to independent world shakers.
        </p>
      </div>
    </div>
    <div class="gallery">
      <img src="week02/images/myrnaLoy06.png" alt="Myrna Loy"/>
      <div class="desc" onclick="show('06')">Timeless</div>
      <div class="about" id="06">
        <p>
          Myrna is an example of a woman dedicated to her dreams. Her beauty, skill, and courage, has had a lasting effect on our world. 
        </p>
      </div>
    </div>
    </div>
  </div>
</div>

<!-------------------------- FOOTER ---------------------------->
<div class="row">
  <?php require "footer.php"?>
</div>
</body>
</html>