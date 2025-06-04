<?php
require_once __DIR__ . '/../models/Task.php';

class TaskController {
    public function index()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $status = $_GET['status'] ?? null;

        $taskModel = new Task();
        $tasks = $taskModel->getTasksByUser($user_id, $status);

        include __DIR__ . '/../views/tasks/list.php';
    }
}
