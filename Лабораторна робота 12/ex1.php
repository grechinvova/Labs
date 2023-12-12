<?php
session_start();
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
        try {
            $pdo = new PDO("mysql:host=".$database_host.";dbname=".$database_name."", $database_username, $database_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Помилка підключення до бази даних: " . $e->getMessage();
            exit();
        }

foreach ($prods as $product) {
		$sql = "SELECT * FROM products WHERE name = :name";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name', $product->name);

    if ($stmt->execute()) {
        if (!$stmt->fetch(PDO::FETCH_ASSOC)){
        $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $product->name);
        $stmt->bindParam(':price', $product->price);

        if ($stmt->execute()) {
            echo "Користувач доданий успішно!";
        } else {
            echo "Помилка при додаванні користувача.";
	}}}
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE login = :login";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':login', $username);

    if ($stmt->execute()) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["user_id"] = $user['ID'];
            echo "Авторизація успішна. Ви увійшли як " . $user['login'];
			echo '<form action="<?php session_destroy();?>"><input type="submit" value="Вийти"></form>';
$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);

if ($stmt->rowCount() > 0) {
    echo "<h1>Список ghjlernsd</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Назва</th><th>Ціна</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "У базі даних немає ghhjgh.";
}
			
        } else {
            echo "Неправильне ім'я користувача або пароль.";
        }
    } else {
        echo "Помилка при авторизації.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Авторизація</title>
</head>
<body>
    <h1>Вхід до системи</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="username">Ім'я користувача:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Увійти">
    </form>
	<form action="<?php session_abort(); ?>">
	<input type="submit" value="Вийти">
	</form>
</body>
</html>