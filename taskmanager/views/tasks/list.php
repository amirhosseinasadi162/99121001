<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>لیست وظایف</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">سلام <?= $_SESSION['username'] ?> 👋</h2>

    <div class="mb-3">
        <a href="index.php" class="btn btn-outline-secondary">همه</a>
        <a href="index.php?status=pending" class="btn btn-outline-warning">در انتظار</a>
        <a href="index.php?status=in_progress" class="btn btn-outline-primary">در حال انجام</a>
        <a href="index.php?status=done" class="btn btn-outline-success">انجام شده</a>
        <a href="create_task.php" class="btn btn-success me-2">افزودن تسک جدید</a>
        
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>عنوان</th>
                <th>توضیحات</th>
                <th>وضعیت</th>
                <th>تاریخ ایجاد</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($tasks)): ?>
                <tr><td colspan="4" class="text-center">هیچ تسکی پیدا نشد.</td></tr>
            <?php else: ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= htmlspecialchars($task['title']) ?></td>
                        <td><?= htmlspecialchars($task['description']) ?></td>
                        <td>
                            <?php
                                switch ($task['status']) {
                                    case 'pending': echo '<span class="badge bg-warning">در انتظار</span>'; break;
                                    case 'in_progress': echo '<span class="badge bg-primary">در حال انجام</span>'; break;
                                    case 'done': echo '<span class="badge bg-success">انجام شده</span>'; break;
                                }
                            ?>
                        </td>
                        <td><?= $task['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="logout.php" class="btn btn-danger float-end">خروج</a>
</div>
</body>
</html>
