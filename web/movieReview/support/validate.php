<?php
/**********************************************************
* Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
* server side form validataion
 **********************************************************/

/*****************************************
 * test input for unknow characters
 *****************************************/
function filterName($field){
  // Sanitize user name
  $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
  
  // Validate user name
  if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
      return $field;
  } else{
    $_SESSION['errorMessage'] = "<span class='message'>invalid username - Unable to register</span>";
      return FALSE;
  }
}    

/*****************************************
 * test input for unknow characters
 *****************************************/
function filterEmail($field){
  // Sanitize e-mail address
  $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
  
  // Validate e-mail address
  if(filter_var($field, FILTER_VALIDATE_EMAIL)){
      return $field;
  } else{
    $_SESSION['errorMessage'] = "<span class='message'>invalid email - Unable to register</span>";
      return FALSE;
  }
}

/*****************************************
 * test input for unknow characters
 *****************************************/
function filterString($field){
  // Sanitize string
  $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
  if(!empty($field)){
      return $field;
  } else{
    $_SESSION['errorMessage'] = "<span class='message'>invalid input - Unable to submit</span>";
      return FALSE;
  }
}

?>