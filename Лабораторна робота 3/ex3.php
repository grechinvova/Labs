<!DOCTYPE html>
<html>
 <head>
  <title>Test</title>
  <meta charset="utf-8">
 </head>
 <body>
  <p>
   <?php
    $hours = getdate()["hours"];
	$minutes = date("i");
	$time = $hours*60+$minutes;
switch (true) {
    case 480<=$time and $time<=540:
        echo "First";
        break;
    case 550<=$time and $time<=610:
        echo "Second";
        break;
    case 640<=$time and $time<=700:
        echo "Third";
        break;
    case 710<=$time and $time<=770:
        echo "Forth";
        break;
	default:
	echo $time;
}?>
  </p>
 </body>
</html>