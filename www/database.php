<?php
$dbhost = "mariadb";
$dbuser = "root";
$dbpass = "password";
$dbname = "webshop";

try {
    $dsn = "mysql:host=$dbhost;dbname=$dbname;charset=utf8mb4";
    $conn = new PDO($dsn, $dbuser, $dbpass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    die("Verbindingsfout: " . $e->getMessage());
}
?>