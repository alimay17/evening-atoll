<?php
$name = $_POST['name'];
$email = $_POST['email'];
$major = $_POST['major'];
$commnt = $_POST['comments'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>
<body>
    <h1>Welcome <?php echo $name; ?></h1>
    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
    <p>Major: <?php echo $major; ?></p>
    <p>Comments: <?php echo $commnt; ?></p>
    <p>I have been to: <?php 
    $continents = $_POST['continents'];
        foreach($continents as $continent){
          echo "<p>". $continent . "</p>";
        }
   
    ?></p>
    
</body>
</html>

