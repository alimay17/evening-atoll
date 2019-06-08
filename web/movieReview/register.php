<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Register. Allows new user to register
 **********************************************************/
session_start();
unset($_SESSION['errorMessage']);
require('support/dbInsert.php');
$db = getDatabase();

// check if input is valid & set local variables
if(isset($_POST['password']) && isset($_POST['username'])
  && isset($_POST['email'])){
  require('support/validate.php');
  $username = filterName($_POST['username']);
  $password = filterString($_POST['password']);
  $email = filterEmail($_POST['email']);

  // insert new user to db and set session to logged in
  if($newUser = getNewUser($username, $email, $password)){
    $_SESSION['user'] = $newUser;
    $_SESSION['loggedIn'] = true;

    // check if is a redirect from a movie page.
    if($_SESSION['return']){
      unset($_SESSION['return']);
      header("Location: movieDetail.php?movie=$_SESSION[movie]");
      die();
    }
  
    // if not redirect send to user page.
    else {
      header("Location: reviewerDetail.php?user=$_SESSION[user]");
      die();
    }
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
    <?php if($_SESSION['errorMessage']) {
      echo $_SESSION['errorMessage'];
      unset($_SESSION['errorMessage']);
    } else { ?>

    <p class="message">All Fields are Required</p> <? } ?>
    <form method="post" onsubmit="return validateRegister()"
        action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="register">
        <label for="username">Username:</label>
        <input type="text" name="username"/>
        <span class="error" id="uNameError"></span><br/>
      </div>
      <div class="register">
        <label for="email" >Email:</label>
        <input type="email" name="email"/>
        <span class="error" id="emailError"></span><br/>
      </div>

      <div class="register">
        <label for="password">Password:</label>
        <input type="password" name="password"/>
        <span class="error" id="passError"></span><br/>
      </div>

      <input class="button" type="submit" name="register" value="REGISTER"/>
    </form>
  </div>
</div>
</div>
<!----------------------- FOOTER ------------------------->
<?php require('footer.php'); ?>
  