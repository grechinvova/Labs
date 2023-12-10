<!DOCTYPE html>
<html>
 <head>
  <title>Test</title>
  <meta charset="utf-8">
 </head>
 <body>
  <h1>Тестова сторінка. ЛР3</h1>
  <?php
  $arNumbers = array(1,2,3,4,5,6,7,12,9);
  function tabl($array)
{
	echo   	"<table>
			<thead>
			<tr>
			<th>col 1</th>
			<th>col 2</th>
			<th>col 3</th>
			</tr>
			</thead>
			<tbody>";
	for ($i = 0; $i <= 2; $i++){
	echo "<tr>";
	for ($j = 0; $j <= 2; $j++){
	echo "<td>";
	echo $array[$i*3+$j];
	echo "</td>";
	}
	echo "</tr>";
	}
	echo "</tbody>
		</table>";
}
	tabl($arNumbers);
  ?>
  <time>
   <?=date("Y-m-d H:i:s")?>
  </time>
 </body>
</html>