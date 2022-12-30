<?php if($this->session->flashdata('nomor') === null): ?>
<div class="container-fluid">
  <div class="row justify-content-center my-3">
    <div class="col-md-6">
      <div class="alert alert-danger">
        <h4>Anda telah malakukan refresh halaman</h4>
        <p>Silahkan lakukan pemesanan kembali jika belum mendapatkan nomor pembayaran</p>
      </div>
    </div>
  </div>
<?php else: ?>
<div class="container-fluid">
  <div class="row justify-content-center my-3">
    <div class="col-md-6">
      <div class="alert alert-danger">
        <h4 class="text-white">PERINGATAN! <br> JANGAN REFRESH HALAMAN INI!!</h4>
        <p>Untuk menghindari kegagalan sistem</p>
      </div>
      <div class="card">
        <div class="card-body">
          <h1 class="text-success">Selamat!</h1>
          <h3>Anda berhasil melakukan pemesanan tiket!</h3>
          <hr>
          <h5 class="text-danger text-center">Silahkan lakukan pembayaran sesuai detail berikut.</h5><br>
          <h3 class="text-center">B03893023</h3>
          <p class="text-center font-weight-bold mb-0">a/n PT.KerataQ</p>
          <p class="text-center">BCA kode bank: 006</p>

          <hr>
          <h5 class="text-center">Total yang harus dibayar</h5>
          <h2 class="text-center"><?= $this->session->flashdata('total') ?></h2>

          <br>
          <h5 class="text-center">Nomor pembayaran anda</h5>
          <h2 class="text-center"><?= $this->session->flashdata('nomor') ?></h2>

          <br><br>
          <p class="text-danger">*Jika sudah transfer lakukan konfirmasi pembayaran pada link <a href="<?= base_url('konfirmasi') ?>" target="_blank">konfirmasi pembayaran</a></p>
          <h4 class="text-center">Terima Kasih!</h4>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>