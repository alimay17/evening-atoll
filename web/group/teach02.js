/**********************************************************
* JavaScript Teach 02: Week 02 Team Coding
* Team-5: Alice Smith
* CS313 - Bro. Porter
**********************************************************/

/**********************************************************
* clicked
**********************************************************/
function clicked() {
  alert("Clicked!");
}

/**********************************************************
* changeColor - Javascript
**********************************************************
function changeColor() {
  var color = document.getElementById("input").value;
  document.getElementById("one").style.backgroundColor = color;
}*/

/**********************************************************
* changeColor - jQuery
**********************************************************/
function changeColor() {
  $("#one").css("background-color", $("#input").val());
}

/**********************************************************
* fade
**********************************************************/
function fade() {
  $("#three").fadeToggle("slow");
}