<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش تسک</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">ویرایش تسک</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">عنوان</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($task['title']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">توضیحات</label>
            <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($task['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">وضعیت</label>
            <select name="status" class="form-control">
                <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>در انتظار</option>
                <option value="in_progress" <?= $task['status'] === 'in_progress' ? 'selected' : '' ?>>در حال انجام</option>
                <option value="done" <?= $task['status'] === 'done' ? 'selected' : '' ?>>انجام شده</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        <a href="index.php" class="btn btn-secondary">بازگشت</a>
    </form>
</div>
</body>
</html>
