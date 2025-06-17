<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulir Buku Tamu - GARIS</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

  <style>
    body {
      background-color:rgb(44, 43, 43);
      font-family: 'Nunito', sans-serif;
    }

    .main-box {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      overflow: hidden;
      margin: 20px auto;
      max-width: 1500px;
    }

    .left-col {
      background: url('flyergkp.png') no-repeat center center;
      background-size: cover;
      min-height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .form-container {
      padding: 30px;
      background-color: #e4e4e4;
    }

    .form-container h3 {
      font-weight: bold;
      margin-bottom: 25px;
      text-align: center;
    }

    #my_camera {
      width: 240px;
      height: 180px;
      margin: 0 auto;
    }

    @media (max-width: 767px) {
      .left-col {
        display: none;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row main-box">
    
    <!-- Kiri: Gambar -->
    <div class="col-md-6 left-col">
      <!-- gambar background diatur via CSS -->
    </div>

    <!-- Kanan: Form -->
    <div class="col-md-6 form-container">
      <h3>Formulir Buku Tamu</h3>
      <form id="bukutamu-form" method="POST">
        
        <div class="form-group">
          <label>Tanggal Kunjungan</label>
          <input type="date" class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan" readonly required>
        </div>

        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama" required>
        </div>

        <input type="hidden" name="tujuan" value="-">

        <!-- Radio Button Asal -->
        <div class="form-group">
          <label>Asal</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="asal" id="instansi" value="Instansi" required>
            <label class="form-check-label" for="instansi">Instansi</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="asal" id="siswa" value="Siswa">
            <label class="form-check-label" for="siswa">Siswa</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="asal" id="umum" value="Umum">
            <label class="form-check-label" for="umum">Umum</label>
          </div>
        </div>

        <div class="form-group">
          <label>Pesan</label>
          <textarea class="form-control" name="keperluan" rows="3" required></textarea>
        </div>

        <input type="hidden" name="telepon" value="-">
        <input type="hidden" name="email" value="-">

        <!-- Foto -->
        <div class="form-group text-center">
          <label>Ambil Foto</label>
          <div id="my_camera" class="mb-2"></div>
          <button type="button" class="btn btn-primary btn-sm" onclick="takeSnapshot()">Ambil Foto</button>
          <input type="hidden" name="foto" id="foto">
          <div id="results" class="mt-2"></div>
        </div>

        <button type="submit" class="btn btn-success btn-block">Submit</button>
      </form>
    </div>
  </div>
</div>

<!-- Modal Notifikasi -->
<div class="modal fade" id="notifikasiModal" tabindex="-1" role="dialog" aria-labelledby="notifikasiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100">GARIS - Buku Tamu</h5>
      </div>
      <div class="modal-body">
        <p>Data berhasil disimpan!</p>
        <p>Terima kasih telah mengisi buku tamu.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // Set tanggal hari ini
  document.addEventListener('DOMContentLoaded', function () {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('tanggal_kunjungan').value = today;
  });

  // Webcam
  Webcam.set({
    width: 240,
    height: 180,
    image_format: 'jpeg',
    jpeg_quality: 90
  });
  Webcam.attach('#my_camera');

  function takeSnapshot() {
    Webcam.snap(function(data_uri) {
      document.getElementById('results').innerHTML = '<img src="' + data_uri + '" class="img-thumbnail"/>';
      document.getElementById('foto').value = data_uri;
    });
  }

  document.getElementById('bukutamu-form').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);

    fetch('simpan_bukutamu.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        $('#notifikasiModal').modal('show');
        document.getElementById('bukutamu-form').reset();
        document.getElementById('results').innerHTML = "";
        document.getElementById('tanggal_kunjungan').value = new Date().toISOString().split('T')[0];
      } else {
        alert(data.message);
      }
    })
    .catch(error => console.error('Error:', error));
  });
</script>

</body>
</html>
