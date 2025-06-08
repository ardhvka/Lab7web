<?= $this->include('template/admin_header.php'); ?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container my-4">
    <!-- Search Form Section -->
    <div class="row mb-5">
        <div class="col-md-6 offset-md-3">
            <form method="get" class="form-search">
                <div class="input-group">
                    <input type="text" name="q" value="<?= $q; ?>" class="form-control" placeholder="Search Data" aria-label="Search">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table Section -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered shadow-sm">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($artikel): foreach ($artikel as $row): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td>
                            <b><?= $row['judul']; ?></b>
                            <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
                        </td>
                        <td><?= $row['tanggal']; ?></td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm" href="<?= base_url('/admin/edit/' . $row['id']); ?>">Edit</a>
                            <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/delete/' . $row['id']); ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Pagination Section -->
   <?= $pager->only(['q'])->links() ?>
</div>
<?= $this->include('template/admin_footer.php'); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
