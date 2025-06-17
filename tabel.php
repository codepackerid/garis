<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Buku Tamu</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
</head>

<body class="bg-gradient-white">
<div class="container">
    <div class="head text-center d-flex align-items-center justify-content-center">
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
                            <button class="btn btn-success" id="exportExcel">Export ke Excel</button>
                        </div>
                    </div>
                    <table class="table table-bordered" id="tabelTamu">
                        <thead>
                            <tr>
                                <th>Tanggal Kunjungan</th>
                                <th>Nama</th>
                                <th>Asal</th>
                                <th>Pesan</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data tamu akan diisi dari database -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/js/sb-admin-2.min.js"></script>

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
                        tableBody = '<tr><td colspan="8" class="text-center">Tidak ada data</td></tr>';
                    } else {
                        data.forEach(function (row) {
                            tableBody += `
                        <tr>
                            <td>${row.tanggal_kunjungan}</td>
                            <td>${row.nama}</td>
                            <td>${row.asal}</td>
                            <td>${row.keperluan}</td>
                            <td><img src="${row.foto}" width="50" class="img-thumbnail"></td>
                        </tr>`;
                    });
                    }
                    $('#tabelTamu tbody').html(tableBody);
                },
                error: function (err) {
                    console.error("Error fetching data:", err);
                    alert("Gagal memuat data tamu.");
                }
            });
        }

        // Load tabel saat halaman pertama kali dibuka
        loadTable();

        // Load tabel saat rentang tanggal diubah
        $('#startDate, #endDate').change(function () {
            let startDate = $('#startDate').val();
            let endDate = $('#endDate').val();
            if (startDate && endDate) {
                loadTable(startDate, endDate);
            }
        });

//export excel
        $('#exportExcel').click(function () {
    console.log("Export button clicked");

    let startDate = $('#startDate').val();
    let endDate = $('#endDate').val();

    if ($("#tabelTamu tbody tr").length === 0) {
        alert("Tidak ada data untuk diekspor!");
        return;
    }

    let table = document.getElementById("tabelTamu");
    let wb = XLSX.utils.book_new();
    let ws = XLSX.utils.table_to_sheet(table);

    let range = XLSX.utils.decode_range(ws["!ref"]);
    for (let C = range.s.c; C <= range.e.c; C++) {
        let maxWidth = 0;
        for (let R = range.s.r; R <= range.e.r; R++) {
            let cellAddress = XLSX.utils.encode_cell({ r: R, c: C });
            let cell = ws[cellAddress];
            if (cell && cell.v) {
                let cellLength = cell.v.toString().length;
                maxWidth = Math.max(maxWidth, cellLength);
            }
        }
        let col = ws["!cols"] || [];
        col[C] = { wch: maxWidth + 2 };
        ws["!cols"] = col;
    }

    let cellStyles = {
        border: {
            top: { style: "thin", color: { auto: 1 } },
            bottom: { style: "thin", color: { auto: 1 } },
            left: { style: "thin", color: { auto: 1 } },
            right: { style: "thin", color: { auto: 1 } }
        },
        alignment: {
            horizontal: "center",
            vertical: "center"
        }
    };

    for (let R = range.s.r; R <= range.e.r; R++) {
        for (let C = range.s.c; C <= range.e.c; C++) {
            let cellAddress = XLSX.utils.encode_cell({ r: R, c: C });
            if (!ws[cellAddress]) continue;
            if (R === 0) {
                ws[cellAddress].s = { font: { bold: true, color: { rgb: "FFFFFF" } }, fill: { fgColor: { rgb: "0070C0" } }, alignment: { horizontal: "center" } };
            } else {
                ws[cellAddress].s = cellStyles;
            }
        }
    }

    // Tambahkan worksheet ke dalam workbook
    XLSX.utils.book_append_sheet(wb, ws, "Daftar Tamu");
    let filename = `daftar_tamu_${startDate}_${endDate}.xlsx`;
    XLSX.writeFile(wb, filename);
});

    });
</script>
</body>
</html>