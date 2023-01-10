<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {
  public function cekLogin($data) {
    // nama table
    // ini sama seperti SELECT * FROM admin WHERE username = username AND passsword = password
    return $this->db->get_where('admin', $data)->num_rows();
  }

  public function getDataStasiun() {
    return $this->db->get('stasiun');
  }

  public function tambah_stasiun($stasiun) {
    $data = [
      "nama_stasiun" => $stasiun
    ];

    return $this->db->insert('stasiun', $data);
  }

  public function delete_stasiun($id) {
    $this->db->where('id', $id);

    return $this->db->delete('stasiun');
  }

  public function getDataEditStasiun($id) {
    $data = [
      'id' => $id
    ];

    return $this->db->get_where('stasiun', $data);
  }

  public function edit_stasiun($nama) {
    $data = [
      'nama_stasiun' => $nama
    ];
    $this->db->where('id', $this->input->post('id'));
    return $this->db->update('stasiun', $data);

  }

  public function tambah_jadwal($data) {
    $this->db->insert('jadwal', $data);
  }

  public function getJadwal() {
    $this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
    $this->db->from('jadwal');
    $this->db->join('stasiun as Asal', 'jadwal.asal = Asal.id', 'left');
    $this->db->join('stasiun as Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');

    return $this->db->get();
  }

  public function hapusJadwal($id) {
    $this->db->where('id', $id);
    return $this->db->delete('jadwal');
  }

  public function getDataEditJadwal($id) {
    $data = [
      'jadwal.id' => $id,
    ];
    
    $this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
    $this->db->from('jadwal');
    $this->db->where($data);
    $this->db->join('stasiun as Asal', 'jadwal.asal = Asal.id', 'left');
    $this->db->join('stasiun as Tujuan', 'jadwal.tujuan = Tujuan.id', 'left');

    return $this->db->get();

  }

  public function edit_jadwal($data) {
    $this->db->where('id', $this->input->post('id'));
    return $this->db->update('jadwal', $data);
  }

  public function getKonfirmasiPembayaran() {
    $where = [
      'status' => 1
    ];

    return $this->db->get_where('pembayaran', $where);
  }

  public function updatePembayaran($id) {
    $data = [
      'status' => 2
    ];
    $this->db->where('id', $id);

    return $this->db->update('pembayaran', $data);
  }

  public function tolakVerifikasi($id) {
    $data = [
      'status' => 3
    ];
    $this->db->where('id', $id);

    return $this->db->update('pembayaran', $data);
  }

  public function prosesBerangkat($id) {
    $data = [
      'status' => 1
    ];

    $this->db->where('id', $id);
    return $this->db->update('jadwal', $data);
  }

  public function getKursi() {
    $this->db->join('jadwal', 'jadwal.id=kursi.id_jadwal');
    return $this->db->get("kursi");
  }

  public function insertKursi($jumlah, $bagian, $id_jadwal) {
    for($i = 1; $i <= $jumlah; $i++) {
      $data = [
        'kursi'  => $i,
        'bagian' => $bagian,
        'id_jadwal' => $id_jadwal,
      ];

      $insert = $this->db->insert('kursi', $data);
    }

    return $insert;
  }

  public function getRiwayatPembelian() {
    $where = [
      'status' => 2
    ];

    return $this->db->get_where('pembayaran', $where);
  }

  public function get_sum() {
    $sql = "SELECT sum(total_pembayaran) as total FROM pembayaran";
    $result = $this->db->query($sql);

    return $result->row()->total;
  }

  public function get_count() {
    $sql = "SELECT count(total_pembayaran) as total FROM pembayaran";
    $result = $this->db->query($sql);

    return $result->row()->total;
  }


}
