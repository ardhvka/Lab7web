<?= $this->include('template/admin_header'); ?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container my-4">
    <h1>Data Artikel</h1>
    
    <!-- Search Form Section -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6 col-sm-8 col-12">
            <form method="get" class="d-flex" role="search" id="searchForm">
                <input type="text" id="searchInput" name="q" class="form-control me-2" placeholder="Cari data" aria-label="Cari data">
                <button type="button" id="searchBtn" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered shadow-sm" id="artikelTable">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data akan diisi oleh AJAX -->
            </tbody>
        </table>
    </div>
</div>

<script src="<?= base_url('/assets/js/jquery-3.7.1.js') ?>"></script>
<script>
$(document).ready(function () {
    function showLoadingMessage() {
        $('#artikelTable tbody').html('<tr><td colspan="4">Loading data...</td></tr>');
    }

    function loadData(query = '') {
        showLoadingMessage();

        $.ajax({
            url: "<?= base_url('ajax/getData') ?>",
            method: "GET",
            dataType: "json",
            data: { q: query }, // kirim parameter pencarian ke server
            success: function (data) {
                var tableBody = "";

                if (data.length === 0) {
                    tableBody = '<tr><td colspan="4" class="text-center">Belum ada data.</td></tr>';
                } else {
                    for (var i = 0; i < data.length; i++) {
                        var row = data[i];
                        tableBody += '<tr>';
                        tableBody += '<td>' + row.id + '</td>';

                        var isiExcerpt = row.isi ? row.isi.substring(0, 50) : '';
                        tableBody += '<td><b>' + row.judul + '</b><p><small>' + isiExcerpt + '</small></p></td>';

                        tableBody += '<td>' + (row.status ? row.status : '---') + '</td>';

                        tableBody += '<td>';
                        tableBody += '<a href="<?= base_url('artikel/edit/') ?>' + row.id + '" class="btn btn-outline-primary btn-sm me-1">Edit</a>';
                        tableBody += '<a href="#" class="btn btn-outline-danger btn-sm btn-delete" data-id="' + row.id + '">Delete</a>';
                        tableBody += '</td>';

                        tableBody += '</tr>';
                    }
                }
                $('#artikelTable tbody').html(tableBody);
            }
        });
    }

    loadData();

    // Search button click handler
    $('#searchBtn').on('click', function () {
        var query = $('#searchInput').val();
        loadData(query);
    });

    // Optional: Enter key on search input triggers search
    $('#searchInput').on('keypress', function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#searchBtn').click();
        }
    });

    // Delete button handler
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: "<?= base_url('ajax/delete/') ?>" + id,
                method: "DELETE",
                success: function () {
                    var query = $('#searchInput').val();
                    loadData(query);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error deleting article: ' + textStatus + ' - ' + errorThrown);
                }
            });
        }
    });
});
</script>

<?= $this->include('template/admin_footer'); ?>
