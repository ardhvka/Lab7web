<?= $this->section('content-terkini') ?>

<ul>
    <?php foreach ($artikel as $row): ?>
        <li>
            <a style="font-size: 0.7rem;" href="<?= base_url('page/artikel/' . $row['slug']) ?>">
                <h6><?= $row['judul'] ?></h6>
                <small>(<?= date('d M Y', strtotime($row['tanggal'])) ?>)</small>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?= $this->endSection() ?>