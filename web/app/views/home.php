<div class="container text-center mt-5">
    <h1 class="mb-4">🎓 خوش آمدید به پروژه نهایی وب با معماری MVC</h1>

    <?php if (isset($_SESSION['user'])): ?>
        <p class="lead">سلام <strong><?= htmlspecialchars($_SESSION['user']['name']) ?></strong> عزیز!</p>
        <a href="index.php?controller=post&action=index" class="btn btn-primary btn-lg mx-2">📄 پست‌های من</a>
        <a href="index.php?controller=auth&action=logout" class="btn btn-outline-danger btn-lg mx-2">🚪 خروج</a>
    <?php else: ?>
        <p class="lead">برای مشاهده پست‌ها و استفاده از امکانات سیستم، ابتدا وارد شوید.</p>
        <a href="index.php?controller=auth&action=login" class="btn btn-success btn-lg">🔐 ورود به سیستم</a>
    <?php endif; ?>
</div>
