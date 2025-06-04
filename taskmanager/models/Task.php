<?php
require_once __DIR__ . '/../config/db.php';

class Task {
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getTasksByUser($user_id, $status = null)
    {
        if ($status && in_array($status, ['pending', 'in_progress', 'done'])) {
            $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE user_id = :user_id AND status = :status ORDER BY created_at DESC");
            $stmt->execute([':user_id' => $user_id, ':status' => $status]);
        } else {
            $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_at DESC");
            $stmt->execute([':user_id' => $user_id]);
        }

        return $stmt->fetchAll();
    }
}
