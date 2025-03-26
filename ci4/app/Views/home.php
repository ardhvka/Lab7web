<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php if ($artikel): ?>
    <?php foreach ($artikel as $row): ?>
        <article class="entry">
            <h5>
                <a href="<?= base_url('/page/artikel/' . $row['slug']); ?>">
                    <?= $row['judul']; ?>
                </a>
            </h5>
        </article>
        <hr class="divider">
    <?php endforeach; ?>
<?php else: ?>
    <article class="entry">
        <h5>Belum ada data.</h5>
    </article>
<?php endif; ?>


<?= $this->endSection() ?>