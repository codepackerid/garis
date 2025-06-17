<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulir Buku Tamu - GARIS</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      font-family: 'Nunito', sans-serif;
      min-height: 100vh;
      padding: 30px 0;
    }

    .main-box {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin: 20px auto;
      max-width: 1200px;
    }

    .left-col {
      background: url('flyergkp.png') no-repeat center center;
      background-size: cover;
      min-height: 600px;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    
    .left-col::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.3);
      z-index: 1;
    }
    
    .left-col-content {
      position: relative;
      z-index: 2;
      color: white;
      text-align: center;
      padding: 20px;
    }
    
    .left-col-content h2 {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 15px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    
    .left-col-content p {
      font-size: 1.2rem;
      margin-bottom: 30px;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
    }

    .form-container {
      padding: 40px;
      background-color: #fff;
    }

    .form-container h3 {
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
      color: #4e73df;
      position: relative;
      padding-bottom: 15px;
    }
    
    .form-container h3:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: linear-gradient(to right, #4e73df, #6610f2);
      border-radius: 2px;
    }

    .form-label {
      font-weight: 600;
      color: #4e73df;
      margin-bottom: 8px;
    }
    
    .form-control {
      padding: 12px;
      border-radius: 10px;
      border: 1px solid #e1e5eb;
      font-size: 1rem;
      transition: all 0.3s;
    }
    
    .form-control:focus {
      border-color: #4e73df;
      box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    .form-check-input:checked {
      background-color: #4e73df;
      border-color: #4e73df;
    }

    #my_camera {
      width: 320px;
      height: 240px;
      margin: 0 auto;
      border-radius: 10px;
      overflow: hidden;
      border: 3px solid #4e73df;
    }
    
    #results {
      margin-top: 15px;
    }
    
    #results img {
      border-radius: 10px;
      border: 3px solid #4e73df;
    }

    .camera-btn {
      background: linear-gradient(135deg, #4e73df 0%, #6610f2 100%);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 50px;
      font-weight: 600;
      margin-top: 10px;
      transition: all 0.3s;
    }
    
    .camera-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .submit-btn {
      background: linear-gradient(135deg, #4e73df 0%, #6610f2 100%);
      color: white;
      border: none;
      padding: 12px;
      border-radius: 50px;
      font-weight: 600;
      margin-top: 20px;
      transition: all 0.3s;
      width: 100%;
      font-size: 1.1rem;
    }
    
    .submit-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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

    @media (max-width: 767px) {
      .left-col {
        min-height: 200px;
      }
      
      .form-container {
        padding: 25px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row main-box">
    
    <!-- Kiri: Gambar -->
    <div class="col-md-6 left-col">
      <div class="left-col-content">
        <h2>Selamat Datang</h2>
        <p>Terima kasih telah mengunjungi kami. Silakan isi buku tamu digital ini.</p>
      </div>
    </div>

    <!-- Kanan: Form -->
    <div class="col-md-6 form-container">
      <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i>Kembali ke Beranda</a>
      <h3>Buku Tamu</h3>
      <form id="bukutamu-form" method="POST">


        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="nama" id="nama" required>
        </div>

        <input type="hidden" name="tujuan" value="-">

        <div class="mb-4">
          <div class="d-flex gap-4 mt-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="asal" id="instansi" value="Instansi" required>
              <label class="form-check-label" for="instansi">Instansi</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="asal" id="siswa" value="Siswa">
              <label class="form-check-label" for="siswa">Siswa</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="asal" id="umum" value="Umum">
              <label class="form-check-label" for="umum">Umum / Orang Tua</label>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="instansi" class="form-label">Asal</label>
          <input type="text" class="form-control" name="instansi" id="instansi_input" placeholder="Nama Instansi / Sekolah / Organisasi" required>
        </div>

        <div class="mb-4">
          <label for="keperluan" class="form-label">Pesan / Kesan</label>
          <textarea class="form-control" name="keperluan" id="keperluan" rows="3" required></textarea>
        </div>

        <input type="hidden" name="telepon" value="-">
        <input type="hidden" name="email" value="-">

        <!-- Foto -->
        <div class="text-center mb-4">
          <label class="form-label d-block mb-3">Ambil Foto</label>
          <div id="my_camera" class="mb-3"></div>
          <button type="button" class="camera-btn" onclick="takeSnapshot()">
            <i class="fas fa-camera me-2"></i>Ambil Foto
          </button>
          <input type="hidden" name="foto" id="foto">
          <div id="results"></div>
        </div>

        <button type="submit" class="submit-btn">
          <i class="fas fa-paper-plane me-2"></i>Kirim Data
        </button>
      </form>
    </div>
  </div>
</div>

<!-- Modal Notifikasi -->
<div class="modal fade" id="notifikasiModal" tabindex="-1" aria-labelledby="notifikasiLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title w-100 fw-bold text-primary">GARIS - Buku Tamu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-4">
        <div class="mb-3">
          <i class="fas fa-check-circle text-success" style="font-size: 3rem;"></i>
        </div>
        <h4 class="mb-3 fw-bold">Terima Kasih!</h4>
        <p class="mb-0">Data berhasil disimpan dalam buku tamu.</p>
      </div>
      <div class="modal-footer border-0 pt-0 justify-content-center">
        <button type="button" class="btn btn-primary px-4 py-2" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Webcam
  Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90
  });
  Webcam.attach('#my_camera');

  function takeSnapshot() {
    Webcam.snap(function(data_uri) {
      document.getElementById('results').innerHTML = '<img src="' + data_uri + '" class="img-fluid"/>';
      document.getElementById('foto').value = data_uri;
    });
  }

  document.getElementById('bukutamu-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Validasi apakah foto sudah diambil
    if (!document.getElementById('foto').value) {
      alert('Silakan ambil foto terlebih dahulu!');
      return false;
    }
    
    let formData = new FormData(this);

    fetch('simpan_bukutamu.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        const myModal = new bootstrap.Modal(document.getElementById('notifikasiModal'));
        myModal.show();
        document.getElementById('bukutamu-form').reset();
        document.getElementById('results').innerHTML = "";
      } else {
        alert(data.message);
      }
    })
    .catch(error => console.error('Error:', error));
  });
</script>

</body>
</html>
