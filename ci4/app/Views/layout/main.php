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
            <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a style="font-size: 1rem;" class="navbar-brand text-white" href="#">Warga Sipil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" aria-current="page" href="<?= base_url('/page/home'); ?>">Home</a>
                    <a class="nav-link text-white" href="<?= base_url('/page/artikel'); ?>">Artikel</a>
                    <a class="nav-link text-white" href="<?= base_url('/page/about'); ?>">About</a>
                    <a class="nav-link text-white" href="<?= base_url('/page/contact'); ?>">Contact</a>
                </div>
                </div>
            </div>
            </nav>
           <!-- MAIN + SIDEBAR SECTION -->
        <div class="row">
            <!-- Main Content -->
            <main id="content-main" class="col-lg-8 col-md-12 mb-4">
                <?= $this->renderSection('content') ?>
            </main>
            <!-- Sidebar -->
            <aside class="col-lg-4 col-md-12">
                <div class="widget-box mb-4">
                    <h4 class="title">Artikel Terkini</h4>
                    <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>
                    <?= $this->renderSection('content-terkini') ?>
                </div>
                <div class="widget-box">
                    <h4 class="title">Kategori</h4>
                    <?= view_cell('App\\Cells\\ArtikelKategori::render') ?>
                    <?= $this->renderSection('content-kategori') ?>
                </div>
            </aside>
        </div>
        <footer class="bg-light text-center py-3 mt-4 border-top">
            <small class="text-muted">&copy; 2021 - Universitas Pelita Bangsa</small>
        </footer>
        </div>
    </body>
</html>