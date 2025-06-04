<?php
// شروع جلسه
session_start();

// بارگذاری فایل‌های موردنیاز
require_once 'config/database.php';
require_once 'helper/functions.php';

// روت ساده (دریافت کنترلر و اکشن از URL)
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';

// ساخت مسیر کنترلر
$controllerFile = "app/controllers/" . ucfirst($controller) . "Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $className = ucfirst($controller) . "Controller";
    $object = new $className();

    if (method_exists($object, $action)) {
        $object->$action();
    } else {
        echo "عملیات (action) '$action' پیدا نشد.";
    }
} else {
    echo "کنترلر '$controller' پیدا نشد.";
}
