/**********************************************************
* JavaScript - jQuery Week02: Homepage
* Alice Smith
* CS313 - Bro. Porter
**********************************************************/
function show (number) {
  var selection = "#" + number;
    $(selection).fadeToggle();
}

function showAll() {
  $(".about").fadeIn();
}

function hideAll() {
  $(".about").fadeOut();
}
