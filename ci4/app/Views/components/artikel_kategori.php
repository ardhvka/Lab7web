<?= $this->section('content-kategori') ?>

<ul>
    <?php foreach ($kategoriList as $kategori): ?>
        <li>
            <a style="font-size: 0.7rem;" href="<?= base_url('/page/home/' . urlencode($kategori['kategori'])) ?>">
                <?= ucfirst($kategori['kategori']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?= $this->endSection() ?>