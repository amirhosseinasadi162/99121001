<?php
require_once 'config/database.php';

// گرفتن لیست پست‌ها
$stmt = $pdo->query("SELECT id FROM posts");
$posts = $stmt->fetchAll(PDO::FETCH_COLUMN);

// برای هر پست، یک مقدار بازدید تصادفی بین 100 تا 1000 تولید کن
foreach ($posts as $post_id) {
    $views = rand(100, 1000);

    $stmt = $pdo->prepare("INSERT INTO post_views (post_id, views) VALUES (?, ?)");
    $stmt->execute([$post_id, $views]);

    echo "✅ بازدید پست $post_id = $views<br>";
}
