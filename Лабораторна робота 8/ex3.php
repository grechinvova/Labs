<!DOCTYPE html>
<html>
<head> 
<title>Test</title>
<meta charset="utf-8">
</head>
<body>
<table>
<tbody>
<?php
class Product {
    public $name;
    public $price;
}
$prods = [];
$filename = "ex3.json";
if (file_exists($filename)) {
    $jsonContent = file_get_contents($filename);
    $prods = json_decode($jsonContent);
}
$pname = "";
$pprice = "";
 if(isset($_POST['name'])) $pname = $_POST['name'];{
 if (isset($_POST['price'])) $pprice = $_POST['price'];{
	$nprod = New Product();
	$nprod->name = $pname;
	$nprod->price = $pprice;
	$prods[] = $nprod;}}
 function NewProduct($filename, $product) {
$jsonContent = json_encode($product, JSON_PRETTY_PRINT);
file_put_contents($filename, $jsonContent);
}
if (isset($nprod)) NewProduct("ex3.json",$prods);
	foreach ($prods as $product) {
    echo "<tr><td>{$product->name}</td><td>{$product->price}</td></tr>";}
?>
</tbody>
</table>
<form method="POST">
	Назва: <input type="text" name="name" required><br>
    Ціна: <input type="number" name="price" required><br>
    <input type="submit" value="Додати">
</form>
</body>
</html>