<?php
require_once __DIR__ . '/../controllers/TaskController.php';

$task = new TaskController();
$task->index();
