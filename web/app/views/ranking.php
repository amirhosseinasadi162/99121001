<h2>رتبه‌بندی پست‌ها براساس بردار ویژه</h2>
<ol class="list-group list-group-numbered">
    <?php foreach ($ranking as $post_id => $value): ?>
        <li class="list-group-item">
            پست <strong><?= $post_id ?></strong> — امتیاز: <code><?= round($value, 4) ?></code>
        </li>
    <?php endforeach; ?>
</ol>

<!-- صفحه‌بندی -->
<nav class="mt-4">
    <ul class="pagination">
        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
            <li class="page-item <?= ($p == $page) ? 'active' : '' ?>">
                <a class="page-link" href="index.php?controller=ranking&action=index&page=<?= $p ?>">
                    <?= $p ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
