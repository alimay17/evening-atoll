/**********************************************************
* Javascript/jQuery Web Application - Movie Review
* Alice Smith
* CS313 - Bro. Porter
**********************************************************/
/************************************
* getMovie
* gets details of individual movies
*************************************/
function getMovie(movie_ID) 
{
  $('#message').html("it Works " + movie_ID);
  $.post("movieDetail.php", {movie:movie_ID},
  function(data, status){
    $('#message').html(data);
  });
}

/************************************
* getReviewer
* Gets details of individual reviewers
*************************************/
function getReviewer(reviewer_ID) 
{
  $('#message').html("it Works " + reviewer_ID);
  $.post("reviewerDetail.php", {reviewer:reviewer_ID},
  function(data, status){
    $('#message').html(data);
  });
  
}

/************************************
* getReviewer
* Gets details of individual reviewers
*************************************/
function submitReview(movie_ID) 
{
  $.post("submitReview.php", {movie:movie_ID},
  function(data, status){
    $('#message').html(data);
  });
  
}