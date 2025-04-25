<?= $this->include('template/admin_header'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Style -->
  <style>
    body {
      background-color: #f4f6f8;
      font-family: 'Segoe UI', sans-serif;
      color: #212529;
    }

    .card-custom {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .card-header-custom {
      background-color: #10375c;
      color: #fff;
      font-weight: 500;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    .btn-submit {
      background-color: #38b000;
      color: #fff;
      border: none;
    }

    .btn-submit:hover {
      background-color: #2d8600;
    }
  </style>
</head>
<body>

<div class="container-sm mt-5 mb-5">
  <div class="card card-custom">
    <div class="card-header card-header-custom">
      <h4 class="mb-0"><?= $title; ?></h4>
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul" value="<?= esc($data['judul'] ?? '') ?>" required>
        </div>
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <input type="text" class="form-control" id="kategori" name="kategori" value="<?= esc($data['kategori'] ?? '') ?>" required>
        </div>
        <div class="mb-3">
          <label for="isi" class="form-label">Isi Artikel</label>
          <textarea class="form-control" id="isi" name="isi" rows="8" required><?= esc($data['isi'] ?? '') ?></textarea>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-submit btn-lg">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?= $this->include('template/admin_footer'); ?>
