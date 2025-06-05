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
    public function create()
{
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $status = $_POST['status'] ?? 'pending';

        if (empty($title)) {
            $error = 'عنوان تسک الزامی است.';
        } else {
            $taskModel = new Task();
            $taskModel->insertTask($_SESSION['user_id'], $title, $description, $status);

            // بازگشت به لیست
            header("Location: index.php");
            exit;
        }
    }

    include __DIR__ . '/../views/tasks/create.php';
}

public function edit()
{
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    $taskModel = new Task();

    if (!isset($_GET['id'])) {
        die("شناسه تسک نامعتبر است.");
    }

    $id = $_GET['id'];
    $task = $taskModel->getTaskById($id);

    if (!$task || $task['user_id'] != $_SESSION['user_id']) {
        die("شما اجازه دسترسی به این تسک را ندارید.");
    }

    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $status = $_POST['status'];

        if (empty($title)) {
            $error = 'عنوان تسک الزامی است.';
        } else {
            $taskModel->updateTask($id, $title, $description, $status);
            header("Location: index.php");
            exit;
        }
    }

    include __DIR__ . '/../views/tasks/edit.php';
}
public function delete()
{
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    if (!isset($_GET['id'])) {
        die("شناسه تسک نامعتبر است.");
    }

    $id = $_GET['id'];
    $taskModel = new Task();
    $task = $taskModel->getTaskById($id);

    if (!$task || $task['user_id'] != $_SESSION['user_id']) {
        die("شما اجازه حذف این تسک را ندارید.");
    }

    $taskModel->deleteTask($id);
    header("Location: index.php");
    exit;
}

}
