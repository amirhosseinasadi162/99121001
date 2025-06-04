<?php
require_once 'config/database.php';

class UserController
{
    public function index()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users ORDER BY name");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $viewFile = 'app/views/users.php';
        include 'app/views/layout.php';
    }
}
