<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?= base_url('bootstrap/favicon.png') ?>" type="image/png">
  <title><?= $judul; ?></title>
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/style.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body <?php if($this->uri->segment(1) === 'print'): ?> onload="window.print()" <?php else: endif; ?> >
<div class="container-fluid">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center">KeretaQ</h1>
          <hr>
          <div class="row">
            <!-- KIRI -->
            <div class="col-md-6">
              <p>Nama Pemesan <br> <strong><?= $detail->nama_pemesan ?></strong></p>
            </div>
            <!-- KANAN -->
            <div class="col-md-6">
              <?php $date = date_create($detail->tanggal) ?>
              <p class="text-right"><strong><?= date_format($date, "d F Y h:i:s") ?></strong></p>
            </div>
            <hr>
            <div class="row">
              <!-- kiri -->
              <div class="col-md-5">
                <p>Jumlah Penumpang : <strong><?= $jml_penumpang ?></strong></p>
                <p>Harga Per Tiket : <strong><?= "Rp " . number_format($detail->harga,0,',','.') ?></strong></p>
                <p>Harga Total : <strong><?= "Rp " . number_format($detail->harga*$jml_penumpang,0,',','.') ?></strong></p>
                <p>Status : <strong class="text-success">Lunas</strong></p>
              </div>
              <!-- kanan -->
              <div class="col-md-7">
                <p>Nama Kereta : <strong><?= $detail->nama_kereta ?></strong></p>
                <?php $date = date_create($detail->tgl_berangkat) ?>
                <p>Berangkat : <strong><?= date_format($date, "d F Y h:i:s") ?></strong></p>
                <?php $date = date_create($detail->tgl_sampai) ?>
                <p>Sampai : <strong><?= date_format($date, "d F Y h:i:s") ?></strong></p>
                <p>Kelas : <strong><?= $detail->kelas; ?></strong></p>
              </div>
            </div>
            <hr>
            <p class="text-center">Rute : <strong><?= $detail->ASAL; ?> - <?= $detail->TUJUAN; ?></strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>