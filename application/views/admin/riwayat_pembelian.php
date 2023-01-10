<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Pembelian</title>
  <link rel="icon" href="<?= base_url('bootstrap/favicon.png') ?>" type="image/png">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/datatables-b.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/style.css'); ?>">
</head>
<body>
  <?php include 'include/navbar.php'; ?>
  
  <div class="container-fluid my-5">
    <h3 class="text-center">Riwayat Penjualan</h3><br>
    <div class="row">
      <div class="card">
        <div class="card-header bg-primary text-white">Daftar Riwayat Pembelian</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-striped table-bordered datatables">
            <a href="<?= base_url('admin/exportExcel') ?>" class="btn btn-success mb-3">Export Excel</a>
            <thead>
              <tr>
                <th>No. Pembayaran</th>
                <th>No Tiket</th>
                <th>Total Pembayaran</th>
                <th width="20%">Bukti Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list as $ls): ?>
                <tr>
                  <td><?= $ls->no_pembayaran; ?></td>
                  <td><?= $ls->no_tiket ?></td>
                  <td><?= "Rp " . number_format($ls->total_pembayaran,0,',','.'); ?></td>
                  <td>
                  <a href="<?= base_url('bootstrap/bukti/'. $ls->bukti) ?>" target="_blank">
                    <img class="my-3" src="<?= base_url('bootstrap/bukti/'. $ls->bukti) ?>" width="40%">
                  </a>
                </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <h5>Total Penjualan: <?= "Rp " . number_format($sum,0,',','.'); ?> </h5>
          <h5>Tiket Terjual: <?= $count; ?></h5>
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