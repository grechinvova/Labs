<!DOCTYPE html>
<html>
<head>
<title>Test</title>
<meta charset="utf-8">
</head>
<body>
    <h1>Тестова сторінка. ЛР4</h1>
    <h2>Баготовимірні масиви</h2>
    <p> 
    <?php
    $arr1=array();
	$arr2=array();
	for($i=1;$i<=100;$i++){
	$arr1[]=rand(0,100);
	$arr2[]=rand(0,100);
	}
	 function tabl($array)
{
	echo   	"<table>
			<tbody>";
	for ($i = 0; $i <= 9; $i++){
	echo "<tr>";
	for ($j = 0; $j <= 9; $j++){
	echo "<td>";
	echo $array[$i*9+$j];
	echo "</td>";
	}
	echo "</tr>";
	}
	echo "</tbody>
		</table>";
	}
	function add($array1,$array2){
	$array3=array();
	for($i=0;$i<=99;$i++){
	$array3[]=$array1[$i]+$array2[$i];
	}return($array3);}
	function sub($array1,$array2){
	$array3=array();
	for($i=0;$i<=99;$i++){
	$array3[]=$array1[$i]-$array2[$i];
	}return($array3);}
	echo "<p>";
	tabl($arr1);
	echo "</p><p>";
	tabl($arr2);
	echo "</p><p>";
	tabl(add($arr1,$arr2));
	echo "</p><p>";
	tabl(sub($arr1,$arr2));
	echo "</p>";
    ?>
    </p>
    <time>
        <?php
        echo date("Y-m-d H:i:s"); 
        ?> 
    </time> 
</body>
</html>