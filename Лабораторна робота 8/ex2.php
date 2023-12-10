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
$pname = "";
$pprice = "";
 if(isset($_POST['name'])) $pname = $_POST['name'];{
 if (isset($_POST['price'])) $pprice = $_POST['price'];{
	$nprod = New Product();
	$nprod->name = $pname;
	$nprod->price = $pprice;}}
 function NewProduct($filename, $product) {
    $dom = new DOMDocument();
    $dom->load($filename);

    // Отримання кореневого елемента
    $root = $dom->documentElement;

    // Додавання нового об'єкта "Person" у XML
    $productNode = $dom->createElement('product');

    $nameNode = $dom->createElement('name', $product->name);
    $productNode->appendChild($nameNode);

    $priceNode = $dom->createElement('price', $product->price);
    $productNode->appendChild($priceNode);

    $root->appendChild($productNode);

    // Збереження змін у файл
    $dom->save($filename);
}
if (isset($nprod)) NewProduct("ex2.xml",$nprod);
$prods = [];
$dom_xml = new DomDocument;
$dom_xml->load('ex2.xml');
$prod=$dom_xml->getElementsByTagName("product");
foreach ($prod as $prodnode) {
        $pr = new Product();
        $pr->name = $prodnode->getElementsByTagName('name')->item(0)->nodeValue;
        $pr->price = $prodnode->getElementsByTagName('price')->item(0)->nodeValue;
        $prods[] = $pr;
    }
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