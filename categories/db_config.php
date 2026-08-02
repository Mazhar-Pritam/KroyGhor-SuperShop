<?php
// db_config.php
// Database connection settings — apnar project e already ekta config file thakle
// eta bad diye shei config include korte paren.

$db_host = 'localhost';
$db_name = 'kroyghor_supershop';
$db_user = 'root';
$db_pass = ''; // XAMPP e default password khali thake

try {
    $pdo = new PDO(
        "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4",
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
