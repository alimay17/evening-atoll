<?php
/**********************************************************
 * Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* Logout. Destroys the session and redirect to landing page
 **********************************************************/
  session_start();
  session_destroy();
  header("Location: landing.php");
?>