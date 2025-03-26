<?= $this->include('template/admin_header'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<div class="container mt-5">
  <form action="" method="post">
      <h2><?= $title; ?></h2>
      <p>
          <input type="text" name="judul" placeholder="judul">
      </p>
      <p>
          <input type="text" name="kategori" placeholder="kategori">
      </p>
      <p>
          <textarea name="isi" cols="50" rows="10"></textarea>
      </p>
      <p>
          <input type="submit" value="Kirim" class="btn btn-large">
      </p>
  </form>
</div>

<?= $this->include('template/admin_footer'); ?>