<h2>ویرایش پست</h2>
<form method="POST" action="index.php?controller=post&action=update" class="col-md-8">
    <input type="hidden" name="id" value="<?= $post['id'] ?>">
    
    <div class="mb-3">
        <label for="title" class="form-label">عنوان:</label>
        <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($post['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">متن:</label>
        <textarea name="content" class="form-control" rows="4" required><?= htmlspecialchars($post['content']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">بروزرسانی</button>
    <a href="index.php?controller=post&action=index" class="btn btn-secondary">بازگشت</a>
</form>
