<div class="container my-4">
  <div class="card">
    <div class="card-header bg-primary text-white">Info Perjalanan</div>
    <div class="card-body">
      <div class="form-group">
        <div class="col-md-2">
          <label>Nama Kereta</label>
        </div>
        <div class="col-md-4">
          <input type="text" value="<?= $info->nama_kereta ?>" disabled class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2">
          <label>Waktu Berangkat</label>
        </div>
        <div class="col-md-4">
          <input type="text" value="<?= $info->tgl_berangkat ?>" disabled class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2">
          <label>Waktu Tiba</label>
        </div>
        <div class="col-md-4">
          <input type="text" value="<?= $info->tgl_sampai ?>" disabled class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2">
          <label>Rute</label>
        </div>
        <div class="col-md-4">
          <span>Dari</span>
          <input type="text" value="<?= $info->ASAL ?>" disabled class="form-control">
          <span>Ke</span>
          <input type="text" value="<?= $info->TUJUAN ?>" disabled class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2">
          <label>Jumlah Penumpang</label>
        </div>
        <div class="col-md-4">
          <input type="text" value="<?= $_GET['p'] ?>" disabled class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2">
          <label>Harga Tiket</label>
        </div>
        <div class="col-md-4">
          <input type="text" value="<?= 'Rp. '.number_format($info->harga, 0, ',', '.') ?>" disabled class="form-control">
        </div>
      </div>
    </div>
  </div>


  <form action="<?= base_url('pesanTiket') ?>" method="POST">
  <input type="hidden" name="penumpang" value="<?= $_GET['p'] ?>">
  <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">
  <input type="hidden" name="harga" value="<?= $info->harga ?>">


    <div class="card my-4">
      <div class="card-header bg-primary text-white">Detail Penumpang</div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>>= 17 Tahun Nomor ID(KTP, NIK, SIM, PASPORT)</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i = 1; $i <= $_GET['p']; $i++) : ?>
              <tr>
                <td><?= $i ?></td>
                <td><input type="text" class="form-control" name="nama<?= $i ?>" required></td>
                <td><input type="text" class="form-control" name="identitas<?= $i ?>" required></td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card my-4">
      <div class="card-header bg-primary text-white">Data Pemesan</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama_pemesan" placeholder="Nama Pemesan" class="form-control" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" placeholder="Email Pemesan" class="form-control" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>No. Telepon</label>
              <input type="text" name="no_telp" placeholder="Nomor Telepon Pemesan" class="form-control" required>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control" rows="10" placeholder="Alamat Pemesan"></textarea>
            </div>
          </div>
          
        </div>
      </div>
      <button class="btn btn-success">Kirim</button>
    </div>
  </form>
</div>