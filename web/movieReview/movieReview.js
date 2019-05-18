/**********************************************************
* Javascript/jQuery Web Application - Movie Review
* Alice Smith
* CS313 - Bro. Porter
**********************************************************/
/************************************
* getMovie
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
* showDesc
*************************************/
function getReviewer(reviewer_ID) 
{
  $('#message').html("it Works " + reviewer_ID);
  $.post("reviewerDetail.php", {reviewer:reviewer_ID},
  function(data, status){
    $('#message').html(data);
  });
  
}