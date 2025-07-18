<?php
$host = 'localhost';            // your DB host
$db   = 'multiplize_investors'; // your database name
$user = 'root';                 // your database user
$pass = '';                     // your database password
$charset = 'utf8mb4';           // recommended charset

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,     // throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fetch assoc arrays
    PDO::ATTR_EMULATE_PREPARES   => false,            // use real prepared statements
];

// Create the PDO connection:
try {
    $conn = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
  