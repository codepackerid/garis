<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Buku Tamu - GARIS</title>

    <!-- Custom fonts & Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Custom styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 30px 0;
        }
        
        .container {
            max-width: 1200px;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }
        
        .logo-container img {
            width: 70px;
            height: auto;
            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.1));
        }
        
        .logo-text {
            margin-left: 15px;
        }
        
        .logo-text h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            color: #4e73df;
            line-height: 1.2;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .card-header {
            background: linear-gradient(135deg, #4e73df 0%, #6610f2 100%);
            color: white;
            border: none;
            padding: 20px;
            position: relative;
        }
        
        .card-header h3 {
            margin: 0;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .form-control, .form-select {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #e1e5eb;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4e73df 0%, #6610f2 100%);
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #1cc88a 0%, #20c997 100%);
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .table {
            margin-top: 20px;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table th {
            background-color: #f8f9fc;
            font-weight: 700;
            color: #4e73df;
            border: none;
            padding: 15px;
        }
        
        .table td {
            vertical-align: middle;
            padding: 15px;
            border-top: 1px solid #e3e6f0;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fc;
        }
        
        .table-hover tbody tr:hover {
            background-color: #eaecf4;
        }
        
        .img-thumbnail {
            border-radius: 10px;
            border: 2px solid #4e73df;
            padding: 3px;
        }
        
        .back-btn {
            display: inline-flex;
            align-items: center;
            color: #4e73df;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .back-btn i {
            margin-right: 8px;
        }
        
        .back-btn:hover {
            transform: translateX(-3px);
            color: #6610f2;
        }
        
        .filter-section {
            background-color: #f8f9fc;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .filter-section .col-form-label {
            font-weight: 600;
            color: #4e73df;
        }
        
        .dataTables_filter input {
            padding: 8px 12px;
            border-radius: 50px;
            border: 1px solid #e1e5eb;
        }
        
        .dataTables_length select {
            padding: 8px;
            border-radius: 10px;
            border: 1px solid #e1e5eb;
        }
        
        .pagination .page-item.active .page-link {
            background-color: #4e73df;
            border-color: #4e73df;
        }
        
        .pagination .page-link {
            color: #4e73df;
        }
    </style>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- Logo dan Judul -->
        <div class="logo-container">
            <img src="assets/img/logo-grafika.png" alt="Logo GARIS">
            <div class="logo-text">
                <h2>Grafika Apresiasi Silaturahmi</h2>
                <h2>GARIS</h2>
            </div>
        </div>
        
        <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i>Kembali ke Beranda</a>

        <div class="card shadow">
            <div class="card-header">
                <h3><i class="fas fa-book me-2"></i>Daftar Tamu</h3>
            </div>
            <div class="card-body">
                <!-- Filter -->
                <div class="filter-section">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="startDate" class="col-form-label">Dari Tanggal:</label>
                                <input type="date" id="startDate" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mb-md-0">
                                <label for="endDate" class="col-form-label">Sampai Tanggal:</label>
                                <input type="date" id="endDate" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-md-end align-items-end h-100">
                                <button class="btn btn-success" id="filterBtn">
                                    <i class="fas fa-filter me-2"></i>Filter
                                </button>
                                <button class="btn btn-primary ms-2" id="exportExcel">
                                    <i class="fas fa-file-excel me-2"></i>Export
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tabelTamu">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
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

    <!-- Custom script -->
    <script>
        $(document).ready(function () {
            // Inisialisasi DataTable
            let dataTable = $('#tabelTamu').DataTable({
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    zeroRecords: "Tidak ada data yang ditemukan",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                },
                responsive: true
            });
            
            function loadTable(startDate = '', endDate = '') {
                $.ajax({
                    url: 'tampil_bukutamu.php',
                    type: 'GET',
                    data: { startDate: startDate, endDate: endDate },
                    dataType: 'json',
                    beforeSend: function() {
                        // Clear previous data and show loading
                        dataTable.clear().draw();
                        $('.card-body').append('<div id="loading" class="text-center mt-4"><i class="fas fa-spinner fa-spin fa-2x text-primary"></i><p class="mt-2">Memuat data...</p></div>');
                    },
                    success: function (data) {
                        // Remove loading indicator
                        $('#loading').remove();
                        
                        // Clear the table and add new data
                        dataTable.clear();
                        
                        if (data.length === 0) {
                            // No data found
                            dataTable.draw();
                        } else {
                            // Add data to table
                            data.forEach(function (row) {
                                dataTable.row.add([
                                    formatDate(row.tanggal_kunjungan),
                                    row.nama,
                                    row.instansi || '-',
                                    row.asal,
                                    row.keperluan,
                                    '<img src="' + row.foto + '" width="60" class="img-thumbnail">'
                                ]);
                            });
                            dataTable.draw();
                        }
                    },
                    error: function () {
                        $('#loading').remove();
                        alert("Gagal memuat data tamu.");
                    }
                });
            }
            
            // Format tanggal ke format Indonesia
            function formatDate(dateString) {
                const options = { 
                    weekday: 'long', 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric' 
                };
                const date = new Date(dateString);
                return date.toLocaleDateString('id-ID', options);
            }

            // Load saat halaman dibuka
            loadTable();

            // Filter berdasarkan tanggal
            $('#filterBtn').on('click', function () {
                const start = $('#startDate').val();
                const end = $('#endDate').val();
                
                if (start && end) {
                    if (new Date(start) > new Date(end)) {
                        alert("Tanggal awal tidak boleh lebih besar dari tanggal akhir!");
                        return;
                    }
                    loadTable(start, end);
                } else if (!start && !end) {
                    loadTable();
                } else {
                    alert("Mohon isi kedua tanggal untuk melakukan filter!");
                }
            });

            // Export Excel
            $('#exportExcel').click(function () {
                if (dataTable.data().count() === 0) {
                    alert("Tidak ada data untuk diekspor!");
                    return;
                }

                // Create a workbook and worksheet
                let wb = XLSX.utils.book_new();
                
                // Convert the DataTable to a worksheet
                let ws = XLSX.utils.table_to_sheet(document.getElementById("tabelTamu"));
                
                // Add the worksheet to the workbook
                XLSX.utils.book_append_sheet(wb, ws, "Daftar Tamu");

                // Generate filename
                let startDate = $('#startDate').val() || 'semua';
                let endDate = $('#endDate').val() || 'data';
                let filename = `daftar_tamu_${startDate}_${endDate}.xlsx`;

                // Write the workbook and save the file
                XLSX.writeFile(wb, filename);
            });
        });
    </script>
</body>
</html>
