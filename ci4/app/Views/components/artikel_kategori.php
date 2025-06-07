<ul class="list-group">
    <?php foreach ($kategoriList as $kategori): ?>
        <li class="list-group-item">
            <a href="<?= base_url('page/artikel/kategori/' . $kategori['id_kategori']); ?>">
                <?= esc($kategori['nama_kategori']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
