<h2>افزودن پست جدید</h2>
<form method="POST" action="index.php?controller=post&action=store" class="col-md-8">
    <div class="mb-3">
        <label for="title" class="form-label">عنوان پست:</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">متن پست:</label>
        <textarea name="content" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">ذخیره</button>
    <a href="index.php?controller=post&action=index" class="btn btn-secondary">بازگشت</a>
</form>
