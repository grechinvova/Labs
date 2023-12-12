<?php
// Налаштування БД
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
$database_host = 'localhost';
$database_username = 'root';
$database_password = '';
$database_name = 'Grocery';

// Відкриваємо нове з'єднання з MySQL сервером
$mysqli = new mysqli($database_host, $database_username, $database_password, $database_name);

// Виводимо помилку з'єднання
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$results = $mysqli->query("SELECT name, price FROM products");

print '<table border="1">';
while ($row = $results->fetch_assoc()) {
    print '<tr>';
    print '<td>' . $row["name"] . '</td>';
    print '<td>' . $row["price"] . '</td>';
    print '</tr>';
}
print '</table';

$results->free();
foreach ($prods as $product) {
$product_name = '"' . $mysqli->real_escape_string($product->name) . '"';
$product_price = '"' . $mysqli->real_escape_string($product->price) . '"';

$insert_row = $mysqli->query("INSERT INTO products (name, price) VALUES ($product_name, $product_price)");

if ($insert_row) {
    print 'Запит успішно виконаний! ID останнього вставленого запису: ' . $mysqli->insert_id . '<br />';
} else {
    die('Помилка: (' . $mysqli->errno . ') ' . $mysqli->error);
}}
$mysqli->close();
?>