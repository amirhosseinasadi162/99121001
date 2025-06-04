<?php
require_once 'config/database.php';

class Ranking
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function calculateVector($limit = 10, $offset = 0)
    {
        // گرفتن views
        $stmt = $this->pdo->query("SELECT id, views FROM post_views");
        $postViews = [];
        while ($row = $stmt->fetch()) {
            $postViews[$row['id']] = $row['views'];
        }

        // گرفتن related_posts
        $stmt = $this->pdo->query("SELECT post_1_id, post_2_id FROM related_posts");
        $related = [];
        while ($row = $stmt->fetch()) {
            $related[$row['post_1_id']][] = $row['post_2_id'];
        }

        $matrix = [];
        $postIds = array_keys($postViews);
        foreach ($postIds as $i) {
            foreach ($postIds as $j) {
                $matrix[$i][$j] = 0;
            }
        }

        foreach ($postIds as $i) {
            if (!isset($related[$i])) continue;

            $total_views = 0;
            foreach ($related[$i] as $r) {
                if (isset($postViews[$r])) {
                    $total_views += $postViews[$r];
                }
            }

            foreach ($related[$i] as $j) {
                if (isset($postViews[$j]) && $total_views > 0) {
                    $matrix[$i][$j] = $postViews[$j] / $total_views;
                }
            }
        }

        // الگوریتم توانی
        $vector = array_fill_keys($postIds, 1);
        $iterations = 20;

        for ($k = 0; $k < $iterations; $k++) {
            $newVector = [];
            foreach ($postIds as $i) {
                $sum = 0;
                foreach ($postIds as $j) {
                    $sum += $matrix[$i][$j] * $vector[$j];
                }
                $newVector[$i] = $sum;
            }

            $norm = array_sum($newVector);
            foreach ($postIds as $i) {
                $vector[$i] = $newVector[$i] / $norm;
            }
        }

        arsort($vector);

        // بریدن بردار برای صفحه‌بندی
        $total = count($vector);
        $sliced = array_slice($vector, $offset, $limit, true);

        return [
            'ranking' => $sliced,
            'total'   => $total
        ];
    }
}
