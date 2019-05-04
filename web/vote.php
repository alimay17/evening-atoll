<?php
/**********************************************************
* PHP Week02: Homepage
* Alice Smith
* CS313 - Bro. Porter
* This PHP program takes a poll from the hompage
* saves it on the server and displays the results as a graph
* Result table taken from w3schools.com
**********************************************************/
$vote = $_REQUEST['vote'];

//get file
$filename = "public/docs/poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];

// update vote count
if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $no = $no + 1;
}

//write new votes to txt file
$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<!-- RESULT DISPLAY -->
<h3>Poll Result:</h3>
<table id="result">
  <tr>
    <td>Yes:</td>
    <td>
    <img src="public/images/poll.gif"
    width='<?php echo(100*round($yes/($no+$yes),2)); ?>'
    height='20'>
    <?php echo(100*round($yes/($no+$yes),2)); ?>%
    </td>
  </tr>
  <tr>
    <td>No:</td>
    <td>
    <img src="public/images/poll.gif"
    width='<?php echo(100*round($no/($no+$yes),2)); ?>'
    height='20'>
    <?php echo(100*round($no/($no+$yes),2)); ?>%
    </td>
  </tr>
</table>