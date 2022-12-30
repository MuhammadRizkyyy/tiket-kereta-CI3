<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Guest extends CI_Controller {

  public function keHalamanDepan() {
    $data["judul"] = "KeretaQ | Home";
    $data["stasiun"] = $this->M_Guest->getDataStasiun()->result();

    $this->load->view('guest/template/header', $data);
    $this->load->view('guest/halaman_depan');
    $this->load->view('guest/template/footer');
  }

  public function keHalamanKonfirmasi() {
    $data["judul"] = "Halaman Konfirmasi";

    if(isset($_GET['kode'])):
      $kode = $_GET['kode'];

      $data['no_tiket'] = $this->M_Guest->getPembayaranWhere($kode)->row();
      $data['detail']   = $this->M_Guest->cekKonfirmasi($data['no_tiket']->no_tiket)->result();
      $tiket = $this->M_Guest->getTiketWhere($data['no_tiket']->no_tiket)->row();

      $data['bagian_a'] = $this->M_Guest->getKursiWhere('a', $data['no_tiket']->no_tiket, $tiket->id_jadwal)->result();
      $data['bagian_b'] = $this->M_Guest->getKursiWhere('b', $data['no_tiket']->no_tiket, $tiket->id_jadwal)->result();
    endif;

    $this->load->view('guest/template/header', $data);
    $this->load->view('guest/halaman_konfirmasi');
    $this->load->view('guest/template/footer');
  }

  public function cari_tiket() {
    $data = [
      'asal' => $this->input->post('asal'),
      'tujuan' => $this->input->post('tujuan'),
      'status' => 0
    ];

    $data['tiket'] = $this->M_Guest->cari_tiket($data)->result();

    $data['penumpang'] = $this->input->post('jumlah');

    $data["judul"] = "KeretaQ | Home";
    $data["stasiun"] = $this->M_Guest->getDataStasiun()->result();

    $this->load->view('guest/template/header', $data);
    $this->load->view('guest/halaman_depan');
    $this->load->view('guest/template/footer');

  }

  public function pesan($id) {
    $data["judul"] = "Data Diri";
    $data['info'] = $this->M_Guest->getDataInfoPesan($id)->row();
    $data['id_jadwal'] = $id;

    $this->load->view('guest/template/header', $data);
    $this->load->view('guest/data_diri');
    $this->load->view('guest/template/footer');
  }

  public function pesanTiket() {
    $penumpang = $this->input->post('penumpang');

    // generate no pembayaran
    $cek = $this->M_Guest->getPembayaran()->num_rows()+1;
    $no_pembayaran = 'AC255'.$cek;

    $harga = $this->input->post('harga');
    $total_pembayaran = $penumpang*$harga;

    // input pembayaran
    $no_tiket = 'TOO' . $cek;

    $data = [
      'no_pembayaran' => $no_pembayaran,
      'no_tiket' => $no_tiket,
      'total_pembayaran' => $total_pembayaran,
      'status' => 0
    ];
    $this->M_Guest->insertPembayaran($data);

    // auto generate nomor tiket
    $cek = $this->M_Guest->getTiket()->num_rows()+1;
    

    // input data penumpang
    for($i = 1; $i <= $penumpang; $i++) {
      $data = [
        'nomor_tiket' => $no_tiket,
        'nama' => $this->input->post('nama'. $i),
        'no_identitas' => $this->input->post('identitas'. $i),
      ];
      $this->M_Guest->insertPenumpang($data);
    }

    // input data pemesan
    $data = [
      'nomor_tiket' => $no_tiket,
      'id_jadwal' => $this->input->post('id_jadwal'),
      'nama_pemesan' => $this->input->post('nama_pemesan'),
      'email' => $this->input->post('email'),
      'no_telepon' => $this->input->post('no_telp'),
      'alamat' => $this->input->post('alamat'),
      'tanggal' => date('Y-m-d h:i:s'),
    ];
    $this->M_Guest->insertPemesan($data);

    $this->session->set_flashdata('nomor', $no_pembayaran);
    $this->session->set_flashdata('total', $total_pembayaran);
    redirect('pembayaran');

  }

  public function keHalamanPembayaran() {
    $data["judul"] = "Konfirmasi Pembayaran";

    $this->load->view('guest/template/header', $data);
    $this->load->view('guest/pembayaran');
    $this->load->view('guest/template/footer');
  }

  public function cekKonfirmasi() {
    $kode = $this->input->post('kode');

    // yg gue tulis



    // akhir yg gue tulis
    redirect('konfirmasi?kode='. $kode);
  }

  public function pilihGerbong() {
    $kodenya = $this->input->post('kode');
    $nama = $this->input->post('nama');

    $kode = $this->M_Guest->getPembayaranWhere($kodenya)->row();

    // deklarasi
    $gerbong = $this->input->post('gerbong');
    $bagian = $this->input->post('bagian');
    $kursi = $this->input->post('kursi');

    $data = [
      'gerbong' => $gerbong,
      'bagian'  => $bagian,
      'kursi'   => $kursi
    ];

    // validasi kursi
    $tiket = $this->M_Guest->getTiketWhere($kode->no_tiket)->row();
    $cek = $this->M_Guest->validasiGerbong($gerbong, $bagian, $kursi, $tiket->id_jadwal)->num_rows();

    // jika ada
    if($cek > 0 ) {
      $this->session->set_flashdata('alert', 'Maaf Gerbong, Bagian dan Kursi sudah di pesan');
      redirect('konfirmasi?kode='.$kodenya);
    } else {
      $update = $this->M_Guest->pilihGerbong($data, $kode->no_tiket, $nama);
    }
    
    // update kursi
    $tiket = $this->M_Guest->getTiketWhere($kode->no_tiket)->row();
    $update = $this->M_Guest->updateKursi($kursi);

    if($update) {
      redirect('konfirmasi?kode='.$kodenya);
    } else {
      echo "Gagal";
    }

  }

  public function kirimKonfirmasi() {
    // upload gambar
    $config['upload_path']          = './bootstrap/bukti/';
    $config['allowed_types']        = 'jpg|png|jpeg';
    $config['max_size']             = 2048; // 2 mb
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('gambar')) {
      $error = array('error' => $this->upload->display_errors());

      redirect('konfirmasi', $error);
    } else {
      $data = $this->upload->data();
      $filename = $data['file_name'];
      $no = $this->input->post('no_pembayaran');
      $this->M_Guest->insertBukti($filename, $no);
      $this->session->set_flashdata('pesan', 'Berhasil mengirim bukti, silahkan cek kembali 12 jam kemudian untuk mengecek pembayaran anda');

      redirect('konfirmasi');
    }
  }

  public function print() {
    $data["judul"] = "Print";
    $no_tiket = $this->input->post('no_tiket');

    $data['detail'] = $this->M_Guest->getPrint($no_tiket)->row();
    $data['jml_penumpang'] = $this->M_Guest->cekKonfirmasi($no_tiket)->num_rows();

    $this->load->view('guest/template/header', $data);
    $this->load->view('print', $data);
    $this->load->view('guest/template/footer', $data);
  }
  

}
