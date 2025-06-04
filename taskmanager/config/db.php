<?php
// config/db.php

$host = 'localhost';
$db   = 'task_manager';
$user = 'root';
$pass = ''; // معمولا پسورد در XAMPP خالیه

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // PDO به ما اجازه میده خیلی راحت‌تر با پایگاه داده کار کنیم
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("خطا در اتصال به پایگاه داده: " . $e->getMessage());
}
?>
