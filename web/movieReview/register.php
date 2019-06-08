<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Register. Allows new user to register
 **********************************************************/
session_start();
require('dbAccess/dbInsert.php');
$db = getDatabase();

// check if input is valid & set local variables
if(isset($_POST['password']) && isset($_POST['username'])
  && isset($_POST['email'])){
  $password = pg_escape_string($_POST['password']);
  $username = pg_escape_string($_POST['username']);
  $email = pg_escape_string($_POST['email']);

  // insert new user to db and set session to logged in
  $newUser = getNewUser($username, $email, $password);
  $_SESSION['user'] = $newUser;
  $_SESSION['loggedIn'] = true;

  // check if is a redirect from a movie page.
  if($_SESSION['return']){
    unset($_SESSION['return']);
    header("Location: movieDetail.php?movie=$_SESSION[movie]");
    die();
  }
  
  // if not redirect send to landing page.
  else {
    header("Location: landing.php");
    die();
  }
}
require('header.php');
?>
 <!----------------------- FORM ------------------------>
<div class="row">
<div class="col-12">
<div class="menu">
  <h2 class="inst">REGISTER</h2>
</div> 
  <div class="login">
    <p class="message">All Fields are Required</p>
    <form method="post" onsubmit="return validateLogin()"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <span>Username:</span>
      <input type="text" name="username"/>
      <span class="error" id="uNameError"></span><br/>

      <span>Email:</span>
      <input type="email" name="email"/>
      <span class="error" id="emailError"></span><br/>

      <span>Password:</span>
      <input type="password" name="password"/>
      <span class="error" id="passError"></span><br/>

      <input class="button" type="submit" name="register" value="REGISTER"/>
    </form>
  </div>
</div>
</div>
<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>
  