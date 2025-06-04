<h2>ورود به سیستم</h2>
<form method="POST" action="index.php?controller=auth&action=doLogin" class="col-md-6">
    <div class="mb-3">
        <label for="email" class="form-label">ایمیل:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">رمز عبور:</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">ورود</button>
</form>
