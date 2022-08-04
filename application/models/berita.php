<?php
defined('BASEPATH') or exit('No direct script access allowed');

class berita extends CI_Model
{
  protected $table = 'berita';

  //Menampilkan data Berita berdasarkan idBerita
  public function getById($idBerita)
  {
    return $this->db->where(
      $this->table,
      ["idBerita" => $idBerita]
    )->row();
    //query diatas seperti halnya query pada mysql 
    //select * from berita where idBerita='$idUmkm'
  }

  //Menampilkan semua data berita yang tersimpan
  public function getAll()
  {
    $this->db->from($this->table);
    $this->db->order_by("idBerita", "desc");
    $query = $this->db->get();
    return $query->result();
    //fungsi diatas seperti halnya query 
    //select * from berita order by idBerita desc
  }

  //Menampilkan jumlah data yang tersimpan
  public function count()
  {
    $this->db->count_all($this->table);
    $query = $this->db->get();
    return $query->result();
    //fungsi diatas seperti halnya query 
    //select count * from berita
  }

  //Menyimpan berita baru
  public function simpan()
  {
    $data = array(
      "judul" => $this->input->post('judul'),
      "deskripsi" => $this->input->post('deskripsi'),
      "tanggal" => $this->input->post('tanggal')
    );
    return $this->db->insert(
      $this->table,
      $data
    );
  }

  //Mengedit data berita
  public function edit()
  {
    $data = array(
      "judul" => $this->input->post('judul'),
      "deskripsi" => $this->input->post('deskripsi'),
      "tanggal" => $this->input->post('tanggal')
    );
    return $this->db->update(
      $this->table,
      $data,
      array(
        'idBerita' => $this->input->post('idBerita')
      )
    );
  }

  //Menghapus data berita
  public function hapus($idBerita)
  {
    return $this->db->delete(
      $this->table,
      array("idBerita" => $idBerita)
    );
  }
}
