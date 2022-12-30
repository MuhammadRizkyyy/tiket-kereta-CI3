<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/style.css'); ?>">
</head>
<body>
  
  <?php include 'include/navbar.php'; ?>

  <div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card">
            <div class="card-header bg-warning">Edit Jadwal</div>
            <div class="card-body">
            <form action="<?= base_url('editJadwal') ?>" method="POST">
                <input type="hidden" name="id" value="<?= $data_edit->id ?>">
                <div class="form-group">
                  <label>Nama Kereta</label>
                  <input type="text" class="form-control" name="nama_kereta" required value="<?= $data_edit->nama_kereta ?>">
                </div>

                <div class="form-group">
                  <label>Stasiun Asal</label>
                  <select name="asal" class="form-control" required>
                    <optgroup label="TERPILIH">
                      <option selected value="<?= $data_edit->asal ?>"><?= $data_edit->ASAL ?></option>
                    </optgroup>
                    <optgroup label="PILIHAN">
                      <?php foreach($stasiun as $sts) : ?>
                        <option value="<?= $sts->nama_stasiun ?>"><?= $sts->nama_stasiun ?></option>
                      <?php endforeach; ?>
                    </optgroup>
                  </select>
                </div>

                <div class="form-group">
                  <label>Stasiun TUJUAN</label>
                  <select name="tujuan" class="form-control" required>
                    <optgroup label="TERPILIH">
                      <option selected value="<?= $data_edit->tujuan ?>"><?= $data_edit->TUJUAN ?></option>
                    </optgroup>
                    <optgroup label="PILIHAN">
                    <?php foreach($stasiun as $sts) : ?>
                      <option value="<?= $sts->id ?>"><?= $sts->nama_stasiun ?></option>
                    <?php endforeach; ?>
                    </optgroup>
                  </select>
                </div>

                <div class="form-group">
                  <label>Tanggal Berangkat</label>
                  <?php $date = date_create($data_edit->tgl_berangkat); ?>
                  <input type="datetime-local" name="tgl_berangkat" min="<?= date_format($date, 'Y-m-d\TH:i') ?>" value="<?= date_format($date, 'Y-m-d\TH:i') ?>" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Tanggal Sampai</label>
                  <?php $date = date_create($data_edit->tgl_sampai); ?>
                  <input type="datetime-local" name="tgl_sampai" min="<?= date_format($date, 'Y-m-d\TH:i') ?>" value="<?= date_format($date, 'Y-m-d\TH:i') ?>" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Kelas</label>
                  <select name="kelas" class="form-control" required>
                    <optgroup label="TERPILIH">
                      <option selected value="<?= $data_edit->kelas ?>"><?= $data_edit->kelas ?></option>
                    </optgroup>
                    <optgroup label="PILIHAN">
                      <option value="Ekonomi">Ekonomi</option>
                      <option value="Bisnis">Bisnis</option>
                      <option value="Eksekutif">Eksekutif</option>
                    </optgroup>
                  </select>
                </div>

                <div class="form-group">
                  <label>Harga Tiket</label>
                  <input type="text" class="form-control" name="harga_kereta" required value="<?= $data_edit->harga ?>">
                </div>

                <div class="form-group">
                  <button class="btn btn-primary">Simpan</button>
                </div>
              </form>  
            </div>
          </div>
        </div>
      </div>
  </div>


  <script src="<?= base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>