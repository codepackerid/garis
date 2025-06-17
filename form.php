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
      background-color:rgb(179, 176, 176);
      font-family: 'Nunito', sans-serif;
    }

    .main-box {
      background: none;
      border-radius: 15px;
      margin: 20px auto;
      max-width: 1500px;
      height: 92vh;
      display: flex;
      overflow: hidden;
      box-shadow: none;
    }

    .left-col {
      background: url('flyergkp.png') no-repeat center center;
      background-size: cover;
      width: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .right-col {
      background: #e0e0e0; /* abu-abu sedikit tua */
      padding: 30px;
      width: 50%;
      display: flex;
      flex-direction: column;
      justify-content: center;
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

      .right-col {
        width: 100%;
      }

      .main-box {
        height: auto;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="main-box">
    
    <!-- Kiri: Gambar -->
    <div class="left-col"></div>

    <!-- Kanan: Form -->
    <div class="right-col">
      <div class="form-container">
        <h3>Buku Tamu</h3>
        <form id="bukutamu-form" method="POST">
          <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <input type="date" class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan" required>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <input type="hidden" name="tujuan" value="-">
          <div class="form-group">
            <label>Asal</label>
            <select class="form-control" name="asal" required>
              <option value="">Pilih Asal</option>
              <option value="Instansi">Instansi</option>
              <option value="Siswa">Siswa</option>
              <option value="Umum">Umum</option>
            </select>
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

          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
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

  // Auto-set tanggal hari ini
  document.addEventListener('DOMContentLoaded', function () {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('tanggal_kunjungan').value = today;
  });

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
      } else {
        alert(data.message);
      }
    })
    .catch(error => console.error('Error:', error));
  });
</script>

</body>
</html>
