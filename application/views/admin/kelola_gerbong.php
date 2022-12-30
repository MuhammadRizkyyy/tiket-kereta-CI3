<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Gerbong</title>
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables-b.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/style.css'); ?>">
</head>
<body>
  
  <?php include 'include/navbar.php'; ?>

  <div class="container-fluid my-5">
    <?php if($this->session->flashdata('pesan') !== null): ?>
      <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
      </div>
    <?php endif;  ?>
    
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-primary text-white">Daftar Bagian Gerbong</div>
          <div class="card-body">
          <div class="alert alert-danger">
            <strong>Perhatian!</strong> Tombol "<strong>Hapus Semua Data</strong>" akan menghapus semua data Kursi dan <strong>Data Tidak Akan Kembali Lagi.</strong>
          </div>
          <a onclick="return confirm('Apakah yakin ingin menghapus semua data?')" href="<?= base_url('hapus/semua/kursi') ?>" class="btn btn-danger">Hapus Semua Data</a><br><br>

            <table class="table table-striped table-bordered datatables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kereta</th>
                  <th>Nama Bagian</th>
                  <th>Kursi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach($kursi as $krs): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $krs->nama_kereta; ?></td>
                  <td><?= $krs->bagian; ?></td>
                  <td><?= $krs->kursi; ?></td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <a href="<?= base_url('hapusKursi/'.$krs->id) ?>" class="btn btn-danger">Hapus</a>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-primary text-white">Tambah Kursi</div>
          <div class="card-body">
            <form action="<?= base_url('tambahKursi') ?>" method="POST">
              <div class="form-group">
                <label>Jadwal</label>
                <select name="jadwal" required class="form-control">
                  <?php foreach($jadwal as $jwl) :?>
                    <option value="<?= $jwl->id; ?>"><?= $jwl->nama_kereta; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Bagian</label>
                <select name="bagian" required class="form-control">
                  <option value="a">Bagian A</option>
                  <option value="b">Bagian B</option>
                </select>
              </div>
              <div class="form-group">
                <label>Jumlah Kursi</label>
                <input type="number" name="jumlah" class="form-control" required placeholder="Jumlah kursi">
              </div>
              <div class="form-group">
                <button class="btn btn-success mt-2">Tambah</button>
              </div>
            </form>   
          </div>
        </div>
      </div>
    </div>
  </div>


  


  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="<?= base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('bootstrap/js/datatables.js'); ?>"></script>
  <script src="<?= base_url('bootstrap/js/datatables-b.js'); ?>"></script>
  <?php include 'include/datatables.php'; ?>
</body>
</html>