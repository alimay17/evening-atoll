/**********************************************************
* JavaScript - jQuery Week02: Homepage
* Alice Smith
* CS313 - Bro. Porter
**********************************************************/
function show (number) {
  var selection = "#" + number;
    $(selection).fadeToggle();
}