<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ورود</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">فرم ورود</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="username" class="form-label">نام کاربری</label>
            <input type="text" class="form-control" name="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">رمز عبور</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">ورود</button>
        <div class="mt-3 text-center">
            <span>حساب کاربری ندارید؟</span>
            <a href="register.php" class="btn btn-sm btn-outline-primary ms-2">ثبت‌نام</a>
        </div>
    </form>
</div>

</body>
</html>
