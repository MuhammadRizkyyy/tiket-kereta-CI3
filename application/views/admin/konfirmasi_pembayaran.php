<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konfirmasi Pembayaran</title>
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables-b.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/style.css'); ?>">
</head>
<body>
  
  <?php include 'include/navbar.php'; ?>

  <div class="container-fluid my-5">
    <h3 class="text-center">Daftar bukti konfirmasi pembayaran</h3>
    <div class="row">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-striped table-bordered datatables">
            <thead>
              <tr>
                <th>No. Pembayaran</th>
                <th>No Tiket</th>
                <th>Total Pembayaran</th>
                <th width="20%">Bukti Pembayaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list as $ls): ?>
              <tr>
                <td><?= $ls->no_pembayaran ?></td>
                <td><?= $ls->no_tiket ?></td>
                <td><?= $ls->total_pembayaran ?></td>
                <td>
                  <a href="<?= base_url('bootstrap/bukti/'. $ls->bukti) ?>" target="_blank">
                    <img src="<?= base_url('bootstrap/bukti/'. $ls->bukti) ?>" width="50%">
                  </a>
                </td>
                <td>
                    <a href="<?= base_url('verifikasi/'.$ls->id) ?>" class="btn btn-success" onclick="return confirm('Yakin ingin verifikasi No. <?= $ls->no_pembayaran ?> ?')">Konfirmasi</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
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