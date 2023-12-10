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
    $arPeople=array();
    $arPerson=array(
        "name"=>"Ivan",
        "surname"=>"Kostenko",
        "age"=>20,
        "student"=>true
        );
    $arPeople[]=$arPerson;
    $arPerson=array(
        "name"=>"Ruslan",
        "surname"=>"Kostenko",
        "age"=>12,
        "student"=>false
        );
    $arPeople[]=$arPerson;
    $arPerson=array(
        "name"=>"Petro",
        "surname"=>"Ilchenko",
        "age"=>18,
        "student"=>true
        );
    $arPeople[]=$arPerson;
	function tabl($array){
	echo   	"<table>
			<thead>
			<tr>
			<th>name</th>
			<th>surname</th>
			<th>age</th>
			<th>student</th>
			</tr>
			</thead>
			<tbody>";
	foreach ($array as &$value) {
	echo "<tr><td>";
	echo $value["name"];
	echo "</td><td>";
	echo $value["surname"];
	echo "</td><td>";
	echo $value["age"];
	echo "</td><td>";
	echo $value["student"];
	echo "</td></tr>";
	}}
	tabl ($arPeople);
    ?>
    </p>
    <time>
        <?php
        echo date("Y-m-d H:i:s"); 
        ?> 
    </time> 
</body>
</html>