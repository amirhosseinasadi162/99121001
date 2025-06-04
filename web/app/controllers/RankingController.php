<?php
require_once 'config/database.php';
require_once 'app/models/Ranking.php';

class RankingController
{
    public function index()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $rankingModel = new Ranking();
        $result = $rankingModel->calculateVector($limit, $offset);

        $ranking = $result['ranking'];
        $total = $result['total'];
        $totalPages = ceil($total / $limit);

        $viewFile = 'app/views/ranking.php';
        include 'app/views/layout.php';
    }
}
