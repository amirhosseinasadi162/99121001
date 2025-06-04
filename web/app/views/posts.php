<h2>پست‌های من</h2>

<a href="index.php?controller=post&action=create" class="btn btn-success mb-3">➕ افزودن پست جدید</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>عنوان</th>
            <th>نویسنده</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td><?= htmlspecialchars($post['author']) ?></td>
            <td>
                <a href="index.php?controller=post&action=edit&id=<?= $post['id'] ?>" class="btn btn-sm btn-warning">✏️ ویرایش</a>
                <a href="index.php?controller=post&action=delete&id=<?= $post['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">🗑 حذف</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
