<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Jadwal</title>
  <link rel="icon" href="<?= base_url('bootstrap/favicon.png') ?>" type="image/png">
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
    <div class="card">
      <div class="card-header bg-primary text-white">Daftar Jadwal</div>
      <div class="card-body">
        <div class="alert alert-danger">
          <strong>Perhatian!</strong> Tombol "<strong>Hapus Semua Data</strong>" akan menghapus semua data Jadwal dan <strong>Data Tidak Akan Kembali Lagi.</strong>
        </div>
        
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Jadwal</button>
        <a onclick="return confirm('Apakah yakin ingin menghapus semua data?')" href="<?= base_url('hapus/semua/jadwal') ?>" class="btn btn-danger">Hapus Semua Data</a><br><br>

        <table class="table table-striped table-bordered datatables">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kereta</th>
              <th>Asal</th>
              <th>Tujuan</th>
              <th>Tanggal Berangkat</th>
              <th>Tanggal Sampai</th>
              <th>Kelas</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach($jadwal as $jdw) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $jdw->nama_kereta ?></td>
              <td><?= $jdw->ASAL ?></td>
              <td><?= $jdw->TUJUAN ?></td>
              <td><?= $jdw->tgl_berangkat ?></td>
              <td><?= $jdw->tgl_sampai ?></td>
              <td><?= $jdw->kelas ?></td>
              <td><?= "Rp " . number_format($jdw->harga,0,',','.'); ?></td>
              <td>
                <div class="btn-group btn-group-sm">
                  <a href="<?= base_url('hapusJadwal/'.$jdw->id) ?>" class="btn btn-danger">Hapus</a>
                  <a href="<?= base_url('admin/dashboard/edit-jadwal/'.$jdw->id) ?>" class="btn btn-warning">Edit</a>

                  <?php if($jdw->status === "0"): ?>
                    <a href="<?= base_url('admin/dashboard/berangkat-jadwal/'.$jdw->id) ?>" class="btn btn-info">Berangkat</a>
                  <?php else: ?>
                    <button class="btn btn-info" disabled>Telah Berangkat</button>
                  <?php endif; ?>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal tambah-->
  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary disabled">
          <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Tambah Jadwal</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url('tambahJadwal') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Kereta</label>
            <input type="text" class="form-control" name="nama_kereta" placeholder="Nama Kereta" required>
          </div>

          <div class="form-group">
            <label>Stasiun Asal</label>
            <select name="asal" class="form-control" required>
              <?php foreach($stasiun as $sts) : ?>
                <option value="<?= $sts->id ?>"><?= $sts->nama_stasiun ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Stasiun Tujuan</label>
            <select name="tujuan" class="form-control" required>
            <?php foreach($stasiun as $sts) : ?>
                <option value="<?= $sts->id ?>"><?= $sts->nama_stasiun ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Tanggal Berangkat</label>
            <input type="datetime-local" name="tgl_berangkat" min="<?= date('Y-m-d\TH:i') ?>" value="<?= date('Y-m-d\TH:i') ?>" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Tanggal Sampai</label>
            <input type="datetime-local" name="tgl_sampai" min="<?= date('Y-m-d\TH:i') ?>" value="<?= date('Y-m-d\TH:i') ?>" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control" required>
              <option value="Ekonomi">Ekonomi</option>
              <option value="Bisnis">Bisnis</option>
              <option value="Eksekutif">Eksekutif</option>
            </select>
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" placeholder="Harga" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Tambah</button>
        </div>
        </form>
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