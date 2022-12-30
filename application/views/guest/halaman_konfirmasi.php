<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<div class="container-fluid">
  <div class="row justify-content-center my-5">
    <div class="col-md-6">
      <?php if($this->session->flashdata('pesan') !== null): ?>
        <div class="alert alert-success">
          <?= $this->session->flashdata('pesan') ?>
        </div>
      <?php endif; ?>
      <div class="card">
        <div class="card-header bg-success text-white">
          Konfirmasi Pembayaran
        </div>
        <div class="card-body">
          <form action="<?= base_url('cekKonfirmasi') ?>" method="post">
            <div class="form-group">
              <label>Kode Booking</label>
              <input type="text" name="kode" class="form-control" placeholder="kode booking" required>
            </div>
            
            <div class="form-group">
              <button class="btn btn-success mt-2">Cek kode booking</button>
            </div>
          </form>
        </div>
      </div>
      <hr>

      <?php if(isset($_GET['kode'])): ?>
      <h5>Kode booking: <?= $_GET['kode']; ?></h5>
      <div class="card mb-5">
        <div class="card-header bg-success text-white">
          Detail Pembayaran Anda
        </div>
        <div class="card-body">
          <?php if($no_tiket->no_pembayaran == null): ?>
            <div class="alert alert-danger">
              <h6>Maaf kode yang anda masukkan tidak ditemukan</h6>
            </div>
          <?php else: ?>

          <h1 class="text-center mb-3">
            <?php if($no_tiket->status === '0' || $no_tiket->status === '1'): ?>
              <i class="bi bi-x-lg text-danger"></i> Belum dibayar
            <?php elseif($no_tiket->status === '2'): ?>
              <i class="bi bi-check-circle text-success"></i> Sudah dibayar
            <?php endif; ?>
          </h1>
          <?php if($this->session->flashdata('alert') !== null) : ?>
            <div class="alert alert-danger">
              <?= $this->session->flashdata('alert') ?>
            </div>
          <?php endif; ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>Nama</th>
                  <th>Identitas</th>
                  <th>Gerbong</th>
                  <th>Bagian</th>
                  <th>Kursi</th>
                  <?php if($no_tiket->status !== '2'): ?>
                    <th>Aksi</th>
                  <?php else: endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach($detail as $dtl): ?>
                <tr class="text-center">
                  <td><?= $dtl->nama; ?></td>
                  <td><?= $dtl->no_identitas; ?></td>
                  <td><?= $dtl->gerbong; ?> </td>
                  <td><?= $dtl->bagian; ?></td>
                  <td><?= $dtl->kursi; ?> </td>
                  <?php if($no_tiket->status !== '2'): ?>
                  <td>
                    <?php if($dtl->gerbong === NULL || $dtl->bagian === NULL || $dtl->kursi === NULL) : ?>
                      <a data-bs-toggle="modal" data-bs-target="#pilihGerbong<?= $dtl->id ?>"  href="" class="btn btn-sm btn-warning">Pilih</a>
                    <?php else: ?>
                      <a data-bs-toggle="modal" data-bs-target="#gantiGerbong<?= $dtl->id ?>" href="" class="btn btn-sm btn-success">Ganti</a>
                    <?php endif; ?>
                  </td>
                  <?php else: endif; ?>
                </tr>

                <?php if($dtl->gerbong !== NULL && $dtl->kursi !== NULL && $dtl->bagian !== NULL) :?>
                <!-- Modal ganti -->
                

                <div class="modal fade" id="gantiGerbong<?= $dtl->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Gerbong</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="<?= base_url('pilihGerbong') ?>" method="post">
                        <input type="hidden" name="kode" value="<?= $_GET['kode'] ?>">
                        <input type="hidden" name="nama" value="<?= $dtl->nama ?>">

                        <div class="modal-body">
                          <img src="" class="img-fluid img_gerbong">
                          

                          <select name="gerbong" class="form-control pilih_gerbong" required>
                            <option value="0">=== Pilih Gerbong ===</option>
                            <?php for ($i=1; $i <= 3; $i++) :?>

                              <?php 
                              if($dtl->gerbong == $i):
                                $select = 'selected';
                              else:
                                $select = '';
                              endif;
                              ?>
                              <option <?= $select; ?> value="<?= $i ?>">Gerbong <?= $i ?></option>
                            <?php endfor; ?>
                          </select><br>

                          <select name="bagian" class="form-control bagian" required onchange="cekBagian()">
                            <option value="0">=== Pilih Bagian ===</option>
                            <?php for ($i= 'a'; $i <= 'b'; $i++) :?>
                              <?php 
                              if($dtl->bagian == $i):
                                $select = 'selected';
                              else:
                                $select = '';
                              endif;
                              ?>
                              <option <?= $select; ?> value="<?= $i; ?>"><?= $i; ?></option>
                            <?php endfor; ?>
                          </select><br>

                          <p class="text-danger">Kursi yang tampil hanya yang tersedia saja</p>
                          <select name="kursi" class="form-control bagian_a" required>
                              <?php for($i = 1; $i <= 29; $i++) :?>
                                <?php 
                                  if($dtl->kursi == $i):
                                    $select = 'selected';
                                  else:
                                    $select = '';
                                  endif;
                                ?>
                                <option <?= $select; ?> value="<?= $i; ?>"><?= $i; ?></option>
                              <?php endfor; ?>
                          </select>

                          <select name="kursi" class="form-control bagian_b" required>
                              <?php for($i = 1; $i <= 20; $i++) :?>
                                <?php 
                                  if($dtl->kursi == $i):
                                    $select = 'selected';
                                  else:
                                    $select = '';
                                  endif;
                                ?>
                                <option <?= $select; ?> value="<?= $i; ?>"><?= $i; ?></option>
                              <?php endfor; ?>
                          </select>

                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Ganti Gerbong</button>
                        </div>
                        </form>
                      </div>
                    </div>
                </div>
                <?php else: ?>

                <!-- Modal pilih -->
                  <div class="modal fade" id="pilihGerbong<?= $dtl->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Gerbong</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="<?= base_url('pilihGerbong') ?>" method="post">
                          <input type="hidden" name="kode" value="<?= $_GET['kode'] ?>">
                          <input type="hidden" name="nama" value="<?= $dtl->nama ?>">
                          <div class="modal-body">
                            <img src="" class="img-fluid img_gerbong">

                            <select name="gerbong" class="form-control pilih_gerbong" required>
                              <option value="0" selected>=== Pilih Gerbong ===</option>
                              <option value="1">Gerbong 1</option>
                              <option value="2">Gerbong 2</option>
                              <option value="3">Gerbong 3</option>
                            </select><br>

                            <select name="bagian" class="form-control bagian" required onchange="cekBagian()">
                              <option value="0" selected>=== Pilih Bagian ===</option>
                              <option value="a">A</option>
                              <option value="b">B</option>
                            </select><br>

                            <p class="text-danger">Kursi yang tampil hanya yang tersedia saja</p>
                            <select name="kursi" class="form-control bagian_a" required>
                            <?php foreach($bagian_a as $bagian): ?>
                              <option value="<?= $bagian->id; ?>"><?= $bagian->KURSI; ?></option>
                            <?php endforeach; ?>
                            </select>

                            <select name="kursi" class="form-control bagian_b" required>
                            <?php foreach($bagian_b as $bagian): ?>
                              <option value="<?= $bagian->id; ?>"><?= $bagian->KURSI; ?></option>
                            <?php endforeach; ?>
                            </select>

                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Pilih Gerbong</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
            <p><b>Total Pembayaran Anda: Rp.<?= $no_tiket->total_pembayaran; ?></b> </p>

            <?php if($no_tiket->status === '2'): ?>
              <form action="<?= base_url('print') ?>" method="post">
                <input type="hidden" name="no_tiket" value="<?= $no_tiket->no_tiket ?>">
                <button class="btn btn-danger" type="submit">Print Tiket</button>
              </form>
            <?php endif; ?>

            <?php if($no_tiket->status === '0'): ?>
              <p class="text-danger">Silahkan kirim bukti pembayaran di bawah ini.</p>
              <?= form_open_multipart('kirimKonfirmasi'); ?>
                <input type="hidden" name="no_pembayaran" value="<?= $no_tiket->no_pembayaran ?>">

                <p>Foto bukti pembayaran.</p>
                <input id="gambar" type="file" name="gambar" class="form-control" required>
                <p class="d-none" id="pesan"></p>
                <button id="btn_konfirmasi" type="submit" class="btn btn-dark my-3">Kirim</button>
              <?= form_close(); ?>
            <?php else: ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <?php endif; ?>       
      

    </div>
  </div>
</div>