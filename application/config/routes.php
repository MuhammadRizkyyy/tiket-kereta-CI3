<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['hapus/semua/(:any)'] = 'admin/hapus_semua/$1';

$route['tambahKursi'] = 'admin/tambahKursi';

$route['print'] = 'guest/print';

$route['pilihGerbong'] = 'guest/pilihGerbong';

$route['admin/konfirmasi-pembayaran'] = 'admin/keHalamanKonfirPem';
$route['verifikasi/(:num)'] = 'admin/verifikasiPembayaran/$1';

$route['kirimKonfirmasi'] = 'guest/kirimKonfirmasi';
$route['pembayaran'] = 'guest/keHalamanPembayaran';

$route['pesanTiket'] = 'guest/pesanTiket';
$route['pesan/(:any)'] = 'guest/pesan/$1';

$route['editJadwal'] = 'admin/edit_jadwal';
$route['admin/dashboard/berangkat-jadwal/(:any)'] = 'admin/prosesBerangkat/$1';
$route['admin/dashboard/edit-jadwal/(:any)'] = 'admin/keHalamanEditJadwal/$1';
$route['hapusJadwal/(:any)'] = 'admin/hapusJadwal/$1';
$route['tambahJadwal'] = 'admin/tambah_jadwal';
$route['cariTiket'] = 'guest/cari_tiket';
$route['admin/dashboard/kelola-jadwal'] = 'admin/keHalamanKelolaJadwal';
$route['admin/dashboard/kelola-gerbong'] = 'admin/keHalamanKelolaGerbong';

$route['editStasiun'] = 'admin/edit_stasiun';
$route['admin/dashboard/edit/(:any)'] = 'admin/keHalamanEditStasiun/$1';
$route['hapusStasiun/(:any)'] = 'admin/hapus_stasiun/$1';
$route['tambahStasiun'] = 'admin/tambah_stasiun';
$route['admin/dashboard'] = 'admin/keHalamanDashboard';

$route['prosesLogin'] = 'admin/login';
$route['logout'] = 'admin/logout';
$route['login'] = 'admin/keHalamanLogin';

$route['cekKonfirmasi'] = 'guest/cekKonfirmasi';
$route['konfirmasi'] = 'guest/keHalamanKonfirmasi';
$route['default_controller'] = 'guest/keHalamanDepan';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
