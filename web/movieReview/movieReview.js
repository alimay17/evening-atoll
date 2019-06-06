/**********************************************************
* Javascript/jQuery Web Application - Movie Review
* Alice Smith
* CS313 - Bro. Porter
**********************************************************/
/************************************
* Validate form
* 
*************************************/
function validate() {
  // get data for validation
  var name, image, year, desc;

  name = $("input[name=movie_name]").val();
  image = $("input[name=movie_img]").val();
  year = $("input[name=movie_year]").val();
  desc = $("textarea").val();

  if (!name){
    errorMessage(1);
    return false;
  }
  if (!year){
    errorMessage(2);
    return false;
  }
  if (!desc){
    errorMessage(3);
    return false;
  }
  return true;
}

/************************************
* Validate review form
* 
*************************************/
function validateReview() {
  // get data for validation
  var name, email, score, review;

  name = $("input[name=user_name]").val();
  email = $("input[name=user_email]").val();
  score = $("input[name=score]").val();
  review = $("textarea").val();

  if (!name){
    errorMessage(4);
    return false;
  }
  if (!email){
    errorMessage(5);
    return false;
  }
  if (!score){
    errorMessage(6);
    return false;
  }
  if (!review){
    errorMessage(7);
    return false;
  }
  return true;
}


/**********************************************************
* errorMessage
* prints error message & sets focus on missing form value
**********************************************************/
function errorMessage(num)
{
  $(".error").text('*');
  switch(num)
  {
    case 1 : 
      $("#nameError").text("* Please enter Movie Name");
      $("input[name=movie_name]").focus();
      break;
    case 2 :
      $("#yearError").text("* Please enter the movie release year");
      $("input[name=movie_year]").focus();
      break;
    case 3 :
      $("#descError").text("* Please enter the movie description");
      $("textarea").focus();
      break;
    case 4 :
      $("#userError").text("* Please enter a user name");
      $("input[name=user_name]").focus();
      break;
    case 5 :
      $("#emailError").text("* Please enter valid email");
      $("input[name=user_email]").focus();
      break;
    case 6 :
      $("#scoreError").text("* Please enter score between 1 & 10");
      $("input[name=score]").focus();
      break;
    case 7 :
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

