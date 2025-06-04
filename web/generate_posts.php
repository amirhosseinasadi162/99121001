<?php
require_once 'config/database.php';

// گرفتن تمام شناسه‌های کاربران
$stmt = $pdo->query("SELECT id FROM users");
$user_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);

// تعداد پست‌هایی که می‌خوایم بسازیم
$totalPosts = 70;

for ($i = 1; $i <= $totalPosts; $i++) {
    // انتخاب تصادفی کاربر
    $user_id = $user_ids[array_rand($user_ids)];

    // ساخت عنوان و محتوای تصادفی
    $title = "عنوان پست شماره $i";
    $content = "این متن نمونه برای محتوای پست شماره $i هست.";

    // درج در دیتابیس
    $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $title, $content]);

    echo "✅ پست $i ایجاد شد برای کاربر $user_id<br>";
}
