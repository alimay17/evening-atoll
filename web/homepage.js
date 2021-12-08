/**********************************************************
 * JavaScript/jQuery Week02: Homepage
 * Alice Smith
 * CS313 - Bro. Porter
 **********************************************************/
let fadeswitch = 1;

function show(number) {
  var selection = "#" + number;
  $(selection).fadeToggle();
  fadeswitch = 0;
}

function showAll() {

  if (fadeswitch === 1) {
    $(".card p").fadeToggle();
  } else {
    $(".card p").fadeOut();
    fadeswitch = 1;
  }
}

function getVote(int) {
  $.post("vote.php", {
      vote: int,
    },
    function (data) {
      $("#poll").html(data);
    });
}