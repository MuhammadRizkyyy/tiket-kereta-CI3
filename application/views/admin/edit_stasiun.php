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
            <div class="card-header bg-warning">Edit Stasiun</div>
            <div class="card-body">
              <form action="<?= base_url('editStasiun') ?>" method="post">
                <input type="hidden" name="id" value="<?= $data_stasiun->id ?>">
                <div class="form-group">
                  <label>Nama Stasiun</label>
                  <input type="text" name="nama_stasiun" class="form-control" value="<?= $data_stasiun->nama_stasiun ?>">
                </div>
                <div class="form-group">
                  <button class="btn btn-warning">Edit Stasiun</button>
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