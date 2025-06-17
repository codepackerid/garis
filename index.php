<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GARIS - Buku Tamu</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* ======= Styling Body ======= */
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* ======= Styling Card ======= */
        .card {
            background: linear-gradient(135deg, #0061f2 0%, #6610f2 100%);
            color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            max-width: 450px;
            margin: auto;
            transform: translateY(0);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        /* ======= Styling Gambar ======= */
        .logo-img {
            width: 130px;
            display: block;
            margin: 0 auto 20px;
            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }
        
        .logo-img:hover {
            transform: scale(1.05);
        }

        /* ======= Styling Tombol ======= */
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            margin-top: 15px;
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-light {
            background: #ffffff;
            color: #4e73df;
        }

        .btn-light:hover {
            background: #f8f9fa;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-icon {
            margin-right: 10px;
        }
        
        .tagline {
            margin-bottom: 25px;
            font-weight: 300;
            font-size: 1.1rem;
        }
        
        h2 {
            margin-bottom: 10px;
        }
        
        .footer {
            position: absolute;
            bottom: 15px;
            left: 0;
            right: 0;
            text-align: center;
            color: #6c757d;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <img src="assets/img/logo-grafika.png" alt="Logo GARIS" class="logo-img">
            <h2 class="fw-bold">Grafika Apresiasi Silaturahmi</h2>
            <p class="tagline">Selamat datang di buku tamu digital GARIS.</p>
            <a href="form.php" class="btn btn-light btn-custom">
                <i class="fas fa-edit btn-icon"></i>Isi Buku Tamu
            </a>
            <a href="tabel.php" class="btn btn-light btn-custom">
                <i class="fas fa-table btn-icon"></i>Lihat Daftar Tamu
            </a>
        </div>
    </div>
    
    <div class="footer">
        &copy; 2023 GARIS - Grafika Apresiasi Silaturahmi
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
