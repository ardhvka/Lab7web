<?= $this->include('template/admin_header'); ?>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container my-4">
    <h1>Admin Dashboard</h1>

    <!-- Search Form -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <form id="search-form" class="row g-2">
                <div class="col-md-5">
                    <input type="text" name="q" id="search-box" value="<?= isset($q) ? htmlspecialchars($q) : ''; ?>" class="form-control" placeholder="Cari judul artikel">
                </div>
               <div class="col-md-4">
                    <select name="kategori_id" id="category-filter" class="form-select">
                        <option value="">Semua Kategori</option>
                        <?php if (isset($kategori) && is_array($kategori)): ?>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                                    <?= $k['nama_kategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option disabled>Data kategori tidak tersedia</option>
                        <?php endif; ?>

                    </select>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Article Table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered shadow-sm" id="artikelTable">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Akan diisi via AJAX -->
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div id="pagination-container" class="mt-3"></div>
</div>

<!-- PAKAI CDN agar jQuery tidak 404 -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
$(document).ready(function () {
    const articleContainer = $('#artikelTable tbody');
    const paginationContainer = $('#pagination-container');
    const searchForm = $('#search-form');
    const searchBox = $('#search-box');
    const categoryFilter = $('#category-filter');

    function showLoadingMessage() {
        articleContainer.html('<tr><td colspan="5" class="text-center">Loading data...</td></tr>');
    }

    function fetchData(url) {
        showLoadingMessage();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (data) {
                renderArticles(data.artikel);
                renderPagination(data.pager, data.q, data.kategori_id);
            },
            error: function(xhr) {
                console.log(xhr.responseText); // debug
                articleContainer.html('<tr><td colspan="5" class="text-center text-danger">Gagal mengambil data.</td></tr>');
                paginationContainer.html('');
            }
        });
    }

    function renderArticles(articles) {
        let html = '';
        if (articles.length > 0) {
            articles.forEach(article => {
                const excerpt = article.isi ? article.isi.substring(0, 50) : '';
                html += `
                    <tr>
                        <td>${article.id}</td>
                        <td>
                            <b>${article.judul}</b>
                            <p><small>${excerpt}</small></p>
                        </td>
                        <td>${article.nama_kategori || '-'}</td>
                        <td>${article.status || '-'}</td>
                        <td>
                            <a href="<?= base_url('admin/edit') ?>/${article.id}" class="btn btn-outline-primary btn-sm me-1">Ubah</a>
                            <a href="<?= base_url('admin/delete') ?>/${article.id}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                `;
            });
        } else {
            html = '<tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>';
        }
        articleContainer.html(html);
    }

    function renderPagination(pager, q, kategori_id) {
        if (!pager || !pager.links || pager.links.length === 0) {
            paginationContainer.html('');
            return;
        }

        let html = '<nav><ul class="pagination justify-content-center">';
        pager.links.forEach(link => {
            let url = link.url || '#';
            html += `
                <li class="page-item ${link.active ? 'active' : ''}">
                    <a class="page-link" href="${url}">${link.title}</a>
                </li>
            `;
        });
        html += '</ul></nav>';
        paginationContainer.html(html);
    }

    // Tangani klik pagination
    $(document).on('click', '#pagination-container .page-link', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        if (url && url !== '#') {
            fetchData(url);
        }
    });

    // Submit form search
    searchForm.on('submit', function (e) {
        e.preventDefault();
        const q = searchBox.val();
        const kategori_id = categoryFilter.val();
        fetchData(`<?= base_url('ajax/getData') ?>?q=${q}&kategori_id=${kategori_id}`);
    });

    // Ganti kategori otomatis cari
    categoryFilter.on('change', function () {
        searchForm.trigger('submit');
    });

    // Initial load
    fetchData("<?= base_url('ajax/getData') ?>");
});
</script>

<?= $this->include('template/admin_footer'); ?>
