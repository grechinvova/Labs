<?php
// Налаштування БД
$database_host = 'localhost';
$database_username = 'root';
$database_password = '';
$database_name = 'Products';

// Відкриваємо нове з'єднання з MySQL сервером
$mysqli = new mysqli($database_host, $database_username, $database_password, $database_name);

// Виводимо помилку з'єднання
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$results = $mysqli->query("SELECT id, product_code, product_desc, price FROM products");

print '<table border="1">';

while ($row = $results->fetch_object()) {
    print '<tr>';
    print '<td>' . $row->id . '</td>';
    print '<td>' . $row->product_code . '</td>';
    print '<td>' . $row->product_name . '</td>';
    print '<td>' . $row->product_desc . '</td>';
    print '<td>' . $row->price . '</td>';
    print '</tr>';
}

print '</table>';
$product_name = $mysqli->query("SELECT product_name FROM products WHERE id = 1")->fetch_object()->product_name;

print $product_name;
$results = $mysqli->query("SELECT COUNT(*) FROM products");
$get_total_rows = $results->fetch_row();
print $get_total_rows[0];

$search_product = "PD1001"; // product id

// Створення prepared statement
$query = "SELECT id, product_code, product_desc, price FROM products WHERE product_code=?";
$statement = $mysqli->prepare($query);

// Параметри прив’язки для маркерів, де (s = string, i = integer, d = double, b = blob)
$statement->bind_param('s', $search_product);

// Виконання запиту
$statement->execute();

// Зв'язування результуючих змінних
$statement->bind_result($id, $product_code, $product_desc, $price);

print '<table border="1">';
// Вивід записів
while ($statement->fetch()) {
    print '<tr>';
    print '<td>' . $id . '</td>';
    print '<td>' . $product_code . '</td>';
    print '<td>' . $product_desc . '</td>';
    print '<td>' . $price . '</td>';
    print '</tr>';
}
print '</table>';

// Закриття з'єднання
$statement->close();
$search_ID = 1;
$search_product = "PD1001";

$query = "SELECT id, product_code, product_desc, price FROM products WHERE ID=? AND product_code=?";
$statement = $mysqli->prepare($query);
$statement->bind_param('is', $search_ID, $search_product);
$statement->execute();
$statement->bind_result($id, $product_code, $product_desc, $price);

print '<table border="1">';
while ($statement->fetch()) {
    print '<tr>';
    print '<td>' . $id . '</td>';
    print '<td>' . $product_code . '</td>';
    print '<td>' . $product_desc . '</td>';
    print '<td>' . $price . '</td>';
    print '</tr>';
}
print '</table';

$statement->close();
$product_code = '"' . $mysqli->real_escape_string('P1234') . '"';
$product_name = '"' . $mysqli->real_escape_string('42 inch TV') . '"';
$product_price = '"' . $mysqli->real_escape_string('600') . '"';

$insert_row = $mysqli->query("INSERT INTO products (product_code, product_name, price) VALUES ($product_code, $product_name, $product_price)");

if ($insert_row) {
    print 'Запит успішно виконаний! ID останнього вставленого запису: ' . $mysqli->insert_id . '<br />';
} else {
    die('Помилка: (' . $mysqli->errno . ') ' . $mysqli->error);
}
// Запит на оновлення
$results = $mysqli->query("UPDATE products SET product_name='52 inch TV', product_code='323343' WHERE ID=24");

// Запит на видалення
$results = $mysqli->query("DELETE FROM products WHERE ID=24");

if ($results) {
    print 'Запит успішно виконаний! Запис оновлено/видалено';
} else {
    print 'Помилка: (' . $mysqli->errno . ') ' . $mysqli->error;
}
$mysqli->close();
?>