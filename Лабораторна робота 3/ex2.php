<!DOCTYPE html>
<html>
 <head>
  <title>Test</title>
  <meta charset="utf-8">
 </head>
 <body>
  <p>
   <?=date("Y-m-d H:i:s l")?>
   <?php
    $today = date("l");
switch ($today) {
    case "Monday":
        echo "Понеділок";
        break;
    case "Tuesday":
        echo "Вівторок";
        break;
    case "Wednesday":
        echo "Середа";
        break;
    case "Thursday":
        echo "Четвер";
        break;
    case "Friday":
        echo "П'ятниця";
        break;
    case "Saturday":
        echo "Субота";
        break;
    case "Sunday":
        echo "Неділя";
        break;
}?>
  </p>
 </body>
</html>