<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<h2><?= esc($title) ?></h2>

<ul class="list-group">
<?php foreach ($artikel as $a): ?>
    <li class="list-group-item">
        <a href="<?= base_url('page/artikel/' . $a['slug']) ?>">
            <?= esc($a['judul']) ?>
        </a>
    </li>
<?php endforeach ?>
</ul>

<?= $this->endSection() ?>
