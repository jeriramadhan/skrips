<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelmahasiswa extends CI_Model{

  public function LihatNilaiHarian($nim)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.idmahasiswa = nilai.idmahasiswa');
    $this->db->join('dosen', 'dosen.iddosen = nilai.iddosen');
    $this->db->join('matkul', 'matkul.idmatkul = dosen.idmatkul');
    $this->db->where('mahasiswa.idmahasiswa',$nim);
    $this->db->where('jenis','Harian');
    return $this->db->get();
  }

  public function LihatNilaiUlangan($nim)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.idmahasiswa = nilai.idmahasiswa');
    $this->db->join('dosen', 'dosen.iddosen = nilai.iddosen');
    $this->db->join('matkul', 'matkul.idmatkul = dosen.idmatkul');
    $this->db->where('mahasiswa.idmahasiswa',$nim);
    $this->db->where('jenis','Ulangan');
    return $this->db->get();
  }

  public function LihatNilaiUAS($nim)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.idmahasiswa = nilai.idmahasiswa');
    $this->db->join('dosen', 'dosen.iddosen = nilai.iddosen');
    $this->db->join('matkul', 'matkul.idmatkul = dosen.idmatkul');
    $this->db->where('mahasiswa.idmahasiswa',$nim);
    $this->db->where('jenis','UAS');
    return $this->db->get();
  }

  public function Lihatmahasiswa($id)
  {
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->join('kelas', 'kelas.idKelas = mahasiswa.idKelas');
    $this->db->where('NIM',$id);
    return $this->db->get();
  }

  public function Tampilmatkul()
  {
    return $this->db->get('matkul');
  }

  public function TampilKontrak($nim)
  {
    $this->db->select('*');
    $this->db->from('kontrak');
    $this->db->join('kelas', 'kelas.idKelas = kontrak.idKelas');
    $this->db->join('mahasiswa', 'mahasiswa.idKelas = kelas.idKelas');
    $this->db->where('mahasiswa.NIM',$nim);
    return $this->db->get();
  }

  public function TampilKelas()
  {
    return $this->db->get('kelas');
  }
  public function TampilMateri($nim)
  {
    $this->db->select('*');
    $this->db->from('materi');
    $this->db->join('dosen', 'dosen.iddosen = materi.iddosen');
    $this->db->join('matkul', 'matkul.idmatkul = dosen.idmatkul');
    $this->db->join('kontrak', 'kontrak.idmatkul = matkul.idmatkul');
    $this->db->join('kelas', 'kelas.idKelas = kontrak.idKelas');
    $this->db->join('mahasiswa', 'mahasiswa.idKelas = kelas.idKelas');
    $this->db->where('mahasiswa.idmahasiswa',$nim);
    return $this->db->get();

    $this->db->where('iddosen',$id);
    return $this->db->get('materi');
  }

}
