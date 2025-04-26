<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<article class="entry">
    <h5><?= $title; ?></h5>
    <img src="<?= base_url('gambar/' . $artikel['gambar']); ?>" alt="<?= $artikel['judul']; ?>">
    <p><?= $artikel['isi']; ?></p>
</article>

<?= $this->endSection() ?>