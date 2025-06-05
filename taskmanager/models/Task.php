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
    public function insertTask($user_id, $title, $description, $status)
{
    $stmt = $this->pdo->prepare("INSERT INTO tasks (user_id, title, description, status) VALUES (:user_id, :title, :description, :status)");
    return $stmt->execute([
        ':user_id' => $user_id,
        ':title' => $title,
        ':description' => $description,
        ':status' => $status
    ]);
}

public function getTaskById($id)
{
    $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

public function updateTask($id, $title, $description, $status)
{
    $stmt = $this->pdo->prepare("UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id");
    return $stmt->execute([
        ':id' => $id,
        ':title' => $title,
        ':description' => $description,
        ':status' => $status
    ]);
}

public function deleteTask($id)
{
    $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
    return $stmt->execute([':id' => $id]);
}


}
