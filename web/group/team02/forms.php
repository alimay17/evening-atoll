<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="process.php" method="post">

    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
    <br>
    <input type="radio" name="major" value="Computer Science">Computer Science<br>
    <input type="radio" name="major" value="WDD">WDD<br>
    <input type="radio" name="major" value="CIT">CIT<br>
    <input type="radio" name="major" value="Software Engineering">Software Engineering<br>

    <label for="comments">Comment</label>
    <textarea name="comments" id="comments" cols="30" rows="10"></textarea><br>

    <input type="checkbox" name="continents[]" id="con" value="North America">North America
    <input type="checkbox" name="continents[]" id="con" value="South America">South America
    <input type="checkbox" name="continents[]" id="con" value="Europe">Europe
    <input type="checkbox" name="continents[]" id="con" value="Australia">Australia
    <input type="checkbox" name="continents[]" id="con" value="Asia">Asia
    <input type="checkbox" name="continents[]" id="con" value="Africa">Africa
    <input type="checkbox" name="continents[]" id="con" value="Antarctica">Antarctica

    <input type="submit" value="Submit">
</form>
    
</body>
</html>