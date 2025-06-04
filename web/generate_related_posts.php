<?php
require_once 'config/database.php';

// گرفتن همه پست‌ها
$stmt = $pdo->query("SELECT id FROM posts");
$posts = $stmt->fetchAll(PDO::FETCH_COLUMN);

// برای جلوگیری از روابط تکراری
$existing_relations = [];

foreach ($posts as $post_id) {
    // انتخاب 2 پست متفاوت به عنوان مرتبط
    $related = [];

    while (count($related) < 2) {
        $candidate = $posts[array_rand($posts)];

        // جلوگیری از ارتباط با خودش و از تکرار روابط قبلی
        $key1 = "$post_id-$candidate";
        $key2 = "$candidate-$post_id";

        if ($candidate != $post_id && !in_array($key1, $existing_relations) && !in_array($key2, $existing_relations)) {
            $related[] = $candidate;
            $existing_relations[] = $key1;
        }
    }

    // درج در جدول
    foreach ($related as $related_id) {
        $stmt = $pdo->prepare("INSERT INTO related_posts (post_1_id, post_2_id) VALUES (?, ?)");
        $stmt->execute([$post_id, $related_id]);
        echo "✅ ارتباط بین پست $post_id و پست $related_id ثبت شد<br>";
    }
}
