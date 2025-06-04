<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>افزودن تسک</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">افزودن تسک جدید</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">عنوان</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">توضیحات</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">وضعیت</label>
            <select name="status" class="form-control">
                <option value="pending">در انتظار</option>
                <option value="in_progress">در حال انجام</option>
                <option value="done">انجام شده</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">ثبت تسک</button>
        <a href="index.php" class="btn btn-secondary">بازگشت</a>
    </form>
</div>

</body>
</html>
