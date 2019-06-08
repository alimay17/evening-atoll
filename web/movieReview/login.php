<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Login. Allows an existing user to log in.
 **********************************************************/
session_start();
require('support/dbInsert.php');
require('support/validate.php');

// check if redirect from a movie page
if(isset($_GET['movie'])) { 
  $_SESSION['return'] = true;
  $_SESSION['movie'] = $_GET['movie'];
}
// get db and variables
$db = getDatabase();
$password = filterName($_POST['password']);
$username = filterString($_POST['username']);

// check if user is good and set login.
if(isset($_POST['username']) && isset($_POST['password']) 
    && $result = getUser($username, $password)) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['user'] = $result;

    // if redirect, return to movie page
    if($_SESSION['return']){
      unset($_SESSION['return']);
      header("Location: movieDetail.php?movie=$_SESSION[movie]");
      die();

    // else go to landing
    }else {
      header("Location: reviewerDetail.php?user=$_SESSION[user]");
      die();
    }
}

require('header.php');
  ?>
 <!----------------------- BODY ------------------------> 
<div class="row">
<div class="col-12">
<div class="menu">
  <h2 class="inst">Sign In</h2>
    
  <!-- Register option -->
    <a href="register.php">
      <div class="menuItem">REGISTER</div></a>
  </div> 
  <!-- Instructions -->
  <?php if(isset($_SESSION['loginError'])){
    echo $_SESSION['loginError'];
    unset($_SESSION['loginError']);
  } else { 
    echo '<span class="message">Sign in or Register to review and add movies</span>'; } ?>


  <!----------------------- FORM ------------------------> 
  <div class="login">
    <form method="post" onsubmit="return validateLogin()"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <div class="register">
        <label for="username">Username:</label>
        <input type="text" name="username"/>
        <span class="error" id="uNameError"></span><br/>
      </div>

      <div class="register">
        <label for="password">Password:</label>
        <input type="password" name="password"/>
        <span class="error" id="passError"></span><br/>
      </div>

      <input class="button" type="submit" name="Submit" value="SIGN IN"/>
    </form>
  </div>
</div>
</div>

<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>