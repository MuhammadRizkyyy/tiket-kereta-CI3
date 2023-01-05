<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand text-white" href="#">Admin Panel</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="<?= base_url('admin/dashboard'); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="<?= base_url('admin/dashboard/kelola-jadwal'); ?>">Kelola Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="<?= base_url('admin/dashboard/kelola-gerbong'); ?>">Kelola Gerbong</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="<?= base_url('admin/konfirmasi-pembayaran'); ?>">Konfirmasi Pembayaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="<?= base_url('admin/riwayat-pembelian'); ?>">Riwayat Pembelian</a>
          </li>
        </ul>
        <span>
          <a href="<?= base_url('logout') ?>" class="text-light b" style="text-decoration: none;">Logout</a>
        </span>
      </div>
    </div>
</nav>