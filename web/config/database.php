<?php
$host = 'localhost';
$dbname = 'web_final_db';
$username = 'root';
$password = ''; // رمز عبور root در XAMPP معمولاً خالیه

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
