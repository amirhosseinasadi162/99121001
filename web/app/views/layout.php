<!-- app/views/layout.php -->
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>پروژه نهایی وب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 mb-4">
    <a class="navbar-brand" href="index.php">پروژه MVC</a>
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php?controller=user&action=index">کاربران</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?controller=post&action=index">پست‌ها</a></li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=ranking&action=index">رتبه‌بندی پست‌ها</a>
        </li>

    </ul>
    <ul class="navbar-nav ms-auto">
    <?php if (isset($_SESSION['user'])): ?>
        <li class="nav-item">
            <span class="nav-link">سلام، <?= htmlspecialchars($_SESSION['user']['name']) ?></span>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="index.php?controller=auth&action=logout">خروج</a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=auth&action=login">ورود</a>
        </li>
    <?php endif; ?>
</ul>

</nav>

<div class="container">
    <?php include $viewFile; ?>
</div>

</body>
</html>
