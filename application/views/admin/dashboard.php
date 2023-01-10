<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link rel="icon" href="<?= base_url('bootstrap/favicon.png') ?>" type="image/png">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables-b.css'); ?>">
</head>
<body>
  
  <?php include 'include/navbar.php'; ?>

  <div class="container-fluid my-5">
    <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-primary text-white">Daftar Stasiun</div>
            <div class="card-body">
              <div class="alert alert-danger">
                <strong>Perhatian!</strong> Tombol "<strong>Hapus Semua Data</strong>" akan menghapus semua data Stasiun dan <strong>Data Tidak Akan Kembali Lagi.</strong>
              </div>
              <a onclick="return confirm('Apakah yakin ingin menghapus semua data?')" href="<?= base_url('hapus/semua/stasiun') ?>" class="btn btn-danger">Hapus Semua Data</a><br><br>
              <table class="table table-striped table-bordered datatables">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Stasiun</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach($stasiun as $sts) : 
                  ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $sts->nama_stasiun; ?></td>
                    <td>
                      <div class="btn-group btn-group-sm">
                        <a href="<?= base_url('admin/dashboard/edit/' . $sts->id) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('hapusStasiun/' . $sts->id) ?>" class="btn btn-danger">Hapus</a>
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
            <div class="card-header bg-primary text-white">Tambah Stasiun</div>
            <div class="card-body">
              <form action="<?= base_url('tambahStasiun') ?>" method="POST">
                <div class="form-group">
                  <label>Nama Stasiun</label>
                  <input type="text" class="form-control" name="stasiun" placeholder="Nama Stasiun">
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