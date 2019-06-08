<?php
session_start();
require('dbAccess/dbInsert.php');

// check if redirect from a movie page
if(isset($_GET['movie'])) { 
  $_SESSION['return'] = true;
  $_SESSION['movie'] = $_GET['movie'];
}
$db = getDatabase();
$user = $_POST['username'];
$password = $_POST['password'];
$result = 0;

if(isset($_POST['username']) && isset($_POST['password']) 
    && $result = getUser($user, $password)) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['user'] = $result;
    if($_SESSION['return']){
      unset($_SESSION['return']);
      header("Location: movieDetail.php?movie=$_SESSION[movie]");
      die();
    }else {
      header("Location: landing.php");
      die();
    }
}
else {
  require('header.php');
  ?>
<div class="row">
<div class="col-12">
<div class="menu">
  <h2 class="inst">Sign In</h2>
    <a href="register.php">
      <div class="menuItem">REGISTER</div></a>
  </div> 
    <span class="message">Sign in or Register to review and add movies</span>
  <div class="login">
    <form method="post" onsubmit="return validateLogin()"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <span>Username:</span>
      <input type="text" name="username"/>
      <span class="error" id="uNameError"></span><br/>

      <span>Password:</span>
      <input type="password" name="password"/>
      <span class="error" id="passError"></span><br/>

      <input class="button" type="submit" name="Submit" value="SIGN IN"/>
    </form>
  </div>
</div>
</div>

<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); 
} ?>