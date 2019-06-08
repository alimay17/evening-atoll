/**********************************************************
* Javascript/jQuery - Idaho Reviews Hollywood
* Alice Smith: CS313 - Bro. Porter
**********************************************************/
/************************************
* Validate login form
*************************************/
function validateLogin() {
  username = $("input[name=username").val();
  password = $("input[name=password]").val();

  if (!username){
    errorMessage(1);
    return false;
  }
  if (!password){
    errorMessage(2);
    return false;
  }
  return true;
}

/************************************
* Validate register form
*************************************/
function validateRegister() {
 var username = $("input[name=username").val();
 var password = $("input[name=password]").val();
 var email = $("input[name=email").val();

  if (!username){
    errorMessage(1);
    return false;
  }
  if (!password){
    errorMessage(2);
    return false;
  }
  if (!email){
    errorMessage(3);
    return false;
  }
  return true;
}
/************************************
* Validate add movie form
*************************************/
function validateMovie() {
  // get data for validation
  var name, image, year, desc;

  name = $("input[name=movie_name]").val();
  image = $("input[name=movie_img]").val();
  year = $("input[name=movie_year]").val();
  desc = $("textarea").val();

  if (!name){
    errorMessage(4);
    return false;
  }
  if (!year){
    errorMessage(5);
    return false;
  }
  if (!desc){
    errorMessage(6);
    return false;
  }
  return true;
}

/************************************
* Validate review form
*************************************/
function validateReview() {
  // get data for validation
  var score, review;

  score = $("input[name=score]").val();
  review = $("textarea").val();

  if (!score){
    errorMessage(7);
    return false;
  }
  if (!review){
    errorMessage(8);
    return false;
  }
  return true;
}

/**********************************************************
* errorMessage 
* prints error message & sets focus on missing form values
**********************************************************/
function errorMessage(num)
{
  $(".error").text('*');
  switch(num)
  {
    case 1 :
      $("#uNameError").text("Please enter a username");
      $("input[name=username]").focus();
      break;
    case 2 :
      $("#passError").text("Please enter a password");
      $("input[name=password").focus();
      break;
    case 3 :
        $("#emailError").text("* Please enter valid email");
        $("input[name=email]").focus();
        break;
    case 4 : 
      $("#nameError").text("* Please enter Movie Name");
      $("input[name=movie_name]").focus();
      break;
    case 5 :
      $("#yearError").text("* Please enter the movie release year");
      $("input[name=movie_year]").focus();
      break;
    case 6 :
      $("#descError").text("* Please enter the movie description");
      $("textarea").focus();
      break;
    case 7 :
        $("#scoreError").text("* Please enter score between 1 & 10");
        $("input[name=score]").focus();
        break;
    case 8 :
      $("#reviewError").text("* Please enter a review of the movie");
      $("textarea").focus();
      break;
  }
}

/************************************
* submitReview
* gets submit review form as ajax
*************************************/
function submitReview(movie_ID) 
{
  $.post("submitReview.php", {movie:movie_ID},
  function(data, status){
    $('#review').html(data);
  });
}

