<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GARIS - Buku Tamu</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        /* ======= Styling Body ======= */
        body {
            background: #ffffff; /* Warna latar belakang putih */
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* ======= Styling Card ======= */
        .card {
            background: #007bff; /* Warna card biru */
            color: #fff; /* Warna teks putih */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            margin: auto;
        }

        /* ======= Styling Gambar ======= */
        .logo-img {
            width: 120px;
            display: block;
            margin: 0 auto 15px;
        }

        /* ======= Styling Tombol ======= */
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            margin-top: 10px;
        }

        .btn-light {
            background: #ffffff;
            color: #007bff;
        }

        .btn-light:hover {
            background: #f8f9fa;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <img src="assets/img/logo-grafika.png" alt="Logo GARIS" class="logo-img">
            <h2 class="fw-bold">Grafika Apresiasi Silaturahmi</h2>
            <p>Selamat datang di buku tamu digital GARIS.</p>
            <a href="form.php" class="btn btn-light btn-custom">Isi Buku Tamu</a>
            <a href="tabel.php" class="btn btn-light btn-custom">Lihat Daftar Tamu</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
