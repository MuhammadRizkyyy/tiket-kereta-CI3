<!DOCTYPE html>
<html lang="en">
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
<style>
  .jumbotron {
    background: url('<?= base_url("bootstrap/bg.png") ?>');
  }
</style>

<body <?php if($this->uri->segment(1) === 'print'): ?> onload="window.print()" <?php else: endif; ?> >
  
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand text-white" href="#">KeretaQ</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="<?= base_url(); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= base_url('konfirmasi'); ?>">Konfirmasi Pembayaran</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>