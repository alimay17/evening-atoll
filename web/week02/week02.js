/**********************************************************
* JavaScript/jQuery Week02: Homepage
* Alice Smith
* CS313 - Bro. Porter
**********************************************************/

/**********************************************************
* show
* displays the 'about' paragraph for the input selection
**********************************************************/
function show (number) {
  var selection = "#" + number;
    $(selection).fadeToggle();
}

/**********************************************************
* showAll
* displays or hides all 'about' paragraphs
**********************************************************/
function showAll() {
  $(".about").fadeToggle();
}

/**********************************************************
* getVote
* makes ajax call to server to process and display poll vote
**********************************************************/
function getVote (int) {
  $.post("week02/vote.php",
  {
    vote: int,
  },
  function(data){
    $("#poll").html(data);
  });
}