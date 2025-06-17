<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Buku Tamu</title>

    <!-- Custom fonts -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- JS Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
</head>

<body class="bg-gradient-white">
<div class="container">
    <div class="head text-center d-flex align-items-center justify-content-center mt-4">
        <img src="assets/img/logo-grafika.png" width="90" class="mr-3">
        <div>
            <h2 class="text-dark m-0">Grafika Apresiasi</h2>
            <h2 class="text-dark m-0">Silaturami - GARIS</h2>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center text-dark">Daftar Tamu</h3>
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label>Dari Tanggal:</label>
                            <input type="date" id="startDate" class="form-control">
                        </div>
                        <div class="col-md-5">
                            <label>Sampai Tanggal:</label>
                            <input type="date" id="endDate" class="form-control">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button class="btn btn-success w-100" id="exportExcel">Export ke Excel</button>
                        </div>
                    </div>

                    <table class="table table-bordered" id="tabelTamu">
                        <thead>
                            <tr>
                                <th>Tanggal Kunjungan</th>
                                <th>Nama</th>
                                <th>Instansi</th>
                                <th>Asal</th>
                                <th>Pesan</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan dimuat dari JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Custom script -->
<script>
    $(document).ready(function () {
        function loadTable(startDate = '', endDate = '') {
            $.ajax({
                url: 'tampil_bukutamu.php',
                type: 'GET',
                data: { startDate: startDate, endDate: endDate },
                dataType: 'json',
                success: function (data) {
                    let tableBody = '';
                    if (data.length === 0) {
                        tableBody = '<tr><td colspan="6" class="text-center">Tidak ada data</td></tr>';
                    } else {
                        data.forEach(function (row) {
                            tableBody += `
                                <tr>
                                    <td>${row.tanggal_kunjungan}</td>
                                    <td>${row.nama}</td>
                                    <td>${row.instansi || '-'}</td>
                                    <td>${row.asal}</td>
                                    <td>${row.keperluan}</td>
                                    <td><img src="${row.foto}" width="50" class="img-thumbnail"></td>
                                </tr>`;
                        });
                    }
                    $('#tabelTamu tbody').html(tableBody);
                },
                error: function () {
                    alert("Gagal memuat data tamu.");
                }
            });
        }

        // Load saat halaman dibuka
        loadTable();

        // Load saat tanggal berubah
        $('#startDate, #endDate').on('change', function () {
            const start = $('#startDate').val();
            const end = $('#endDate').val();
            if (start && end) {
                loadTable(start, end);
            }
        });

        // Export Excel
        $('#exportExcel').click(function () {
            if ($("#tabelTamu tbody tr").length === 0) {
                alert("Tidak ada data untuk diekspor!");
                return;
            }

            let table = document.getElementById("tabelTamu");
            let wb = XLSX.utils.book_new();
            let ws = XLSX.utils.table_to_sheet(table);

            XLSX.utils.book_append_sheet(wb, ws, "Daftar Tamu");

            let startDate = $('#startDate').val() || 'semua';
            let endDate = $('#endDate').val() || 'data';
            let filename = `daftar_tamu_${startDate}_${endDate}.xlsx`;

            XLSX.writeFile(wb, filename);
        });
    });
</script>

</body>
</html>
