<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title; ?></title>
        <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container-sm">
            <header>
                <h1>Portal Artikel</h1>
            </header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a style="font-size: 1rem;" class="navbar-brand" href="#">Warga Sipil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="<?= base_url('/page/home'); ?>">Home</a>
                    <a class="nav-link" href="<?= base_url('/page/artikel'); ?>">Artikel</a>
                    <a class="nav-link" href="<?= base_url('/page/about'); ?>">About</a>
                    <a class="nav-link" href="<?= base_url('/page/contact'); ?>">Contact</a>
                </div>
                </div>
            </div>
            </nav>
            <section id="wrapper">
                <section id="main">
                    <?= $this->renderSection('content') ?>
                </section>
                <aside id="sidebar">
                    <div class="widget-box">
                        <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>
                        <h4 class="title">Artikel Terkini</h4>
                        <?= $this->renderSection('content-terkini') ?>
                    </div>
                    <div style="font-size: 6px;" class="widget-box">
                        <?= view_cell('App\\Cells\\ArtikelKategori::render') ?>
                        <h4 class="title">Kategori</h4>
                        <?= $this->renderSection('content-kategori') ?>
                    </div>
                </aside>
            </section>
            <footer>
                <p>&copy; 2021 - Universitas Pelita Bangsa</p>
            </footer>
        </div>
    </body>
</html>