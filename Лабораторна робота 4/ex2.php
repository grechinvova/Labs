<!DOCTYPE html>
<html>
<head>
<title>Test</title>
<meta charset="utf-8">
</head>
<body>
    <!-- Програма сортування масиву -->
    <h1>Тестова сторінка. ЛР4</h1>
    <h2>Баготовимірні масиви</h2>
    <p> 
    <?php
    $shp=array(
        "pen"=>30,
        "bread"=>35,
        "milk"=>20,
        "glue"=>60
        );
	$min=$_GET["min"];
	$max=$_GET["max"];
	function sortshop($array){
	$shop=array_keys($array);
	sort($shop);
	foreach ($shop as $val) {
    echo "item[" . $val . "] = " . $array[$val] . "\n";
	}}
	function value($array,$min,$max){
	foreach ($array as $key => $val) {
	if ($val<=$max and $val>=$min){
    echo "item[" . $key . "] = " . $val . "\n";
	}}}
	echo "<p>";
    sortshop($shp);
	echo "</p><p>";
	value($shp,$min,$max;
	echo "</p>"
    ?>
    </p>
    <time>
        <?php
        echo date("Y-m-d H:i:s"); 
        ?> 
    </time> 
</body>
</html>