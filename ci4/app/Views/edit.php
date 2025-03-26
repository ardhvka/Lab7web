<?= $this->include('template/admin_header'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-sm">
      <form action="" method="post">
          <h4><?= $title; ?></h4>
          <div class="col">
            <p>
                <input type="text" name="judul" placeholder="Judul">
            </p>
          </div>
          <p>
              <input type="text" name="kategori" placeholder="Kategori">
          </p>
          <p>
              <textarea name="isi" cols="50" rows="10" placeholder="Isi"></textarea>
          </p>
          <p>
              <input type="submit" value="Kirim" class="btn btn-large">
          </p>
      </form>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>

<?= $this->include('template/admin_footer'); ?>