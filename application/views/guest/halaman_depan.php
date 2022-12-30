
  <div class="jumbotron jumbotron-fluid" style="padding: 2rem;">
    <div class="container">
      <div class="row">
      <div class="col-md-8">
        <br><br><br><br>
        <h1 class="display-4 text-white">Selamat Datang di KeretaQ</h1>
        <p class="lead text-white">Anda dapat melakukan pemesanan tiket kereta online dengan mudah dan kemana aja.</p>
      </div>
      <div class="col-md-4">
          <form action="<?= base_url('cariTiket') ?>" method="POST">
            <div class="form-group text-white mt-2">
              <label>Stasiun Asal</label>
              <select name="asal" class="form-control">
                <?php foreach($stasiun as $sts) : ?>
                  <option value="<?= $sts->id ?>"><?= $sts->nama_stasiun ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group text-white mt-2">
              <label>Stasiun Tujuan</label>
              <select name="tujuan" class="form-control">
                <?php foreach($stasiun as $sts) : ?>
                  <option value="<?= $sts->id ?>"><?= $sts->nama_stasiun ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group text-white mt-2">
              <label>Tanggal Berangkat</label>
              <input type="date" name="tanggal" class="form-control" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
            </div>
            <div class="form-group text-white mt-2">
              <label>Jumlah Penumpang</label>
              <select name="jumlah" class="form-control">
                <?php for($i = 1; $i <= 8; $i++): ?>
                  <option value="<?= $i; ?>"><?= $i; ?> Penumpang</option>
                <?php endfor; ?>
              </select>
            </div>

            <div class="form-group">
              <div class="d-grid gap-2">
                <button class="btn btn-success mt-3">Cari Tiket!</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
  <hr>
  <?php if(!isset($tiket)) : ?>
    
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead class="bg-primary text-white text-center">
          <tr>
            <th>No</th>
            <th>Nama Kereta</th>
            <th>Tanggal Berangkat</th>
            <th>Tanggal Sampai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php $no = 1; ?>
          <?php foreach($tiket as $tk) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $tk->nama_kereta ?></td>
            <td><?php $date = date_create($tk->tgl_berangkat); echo date_format($date, "d-m-Y h:i:s"); ?></td>
            <td><?php $date = date_create($tk->tgl_sampai); echo date_format($date, "d-m-Y h:i:s"); ?></td>
            <td>
              <a href="<?= base_url('pesan/'.$tk->id.'?p='.$penumpang) ?>" class="btn btn-primary">Pesan</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>

      </table>
    </div>
    <?php endif; ?>
  </div>