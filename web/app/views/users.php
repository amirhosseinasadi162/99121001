<h2>لیست کاربران</h2>
<table class="table table-striped">
    <thead>
        <tr><th>ردیف</th><th>نام</th><th>ایمیل</th></tr>
    </thead>
    <tbody>
    <?php foreach ($users as $index => $user): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
