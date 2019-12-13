<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeldosen extends CI_Model{

  public function Lihatdosen($nip)
  {
    $this->db->where('NIP',$nip);
    return $this->db->get('dosen');
  }

  public function TampilMateri($id)
  {
    $this->db->where('iddosen',$id);
    return $this->db->get('materi');
  }

  public function UbahNilai($data,$id)
  {
    $this->db->where('idNilai',$id);
    $this->db->update('nilai',$data);
  }

  public function HapusNilai($id)
  {
    $this->db->where('idNilai',$id);
    $this->db->delete('nilai');
  }

  public function TampilNilai($id)
  {
    $this->db->where('idNilai',$id);
    return $this->db->get('nilai');
  }

  public function TampilDatamatkul()
  {
    return $this->db->get('matkul');
  }

  public function TampilDatamahasiswa($id)
  {
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->join('kelas', 'kelas.idKelas = mahasiswa.idKelas');
    $this->db->join('kontrak', 'kontrak.idKelas = kelas.idKelas');
    $this->db->join('dosen', 'dosen.idmatkul = kontrak.idmatkul');
    $this->db->where('dosen.NIP',$id);
    return $this->db->get();
  }

  public function Tampildosen()
  {
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->join('matkul', 'matkul.idmatkul = dosen.idmatkul');
    return $this->db->get();
  }

  public function TampilKontrak($nip)
  {
    $this->db->select('*');
    $this->db->from('kontrak');
    $this->db->join('dosen', 'dosen.idmatkul = kontrak.idmatkul');
    $this->db->where('dosen.NIP',$nip);
    return $this->db->get();
  }

  public function TampilDataKelas()
  {
    return $this->db->get('kelas');
  }

  public function InsertNilai($data)
  {
    $this->db->insert('nilai',$data);
  }

  public function LihatNilaiHarian($nip)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.idmahasiswa = nilai.idmahasiswa');
    $this->db->join('dosen', 'dosen.iddosen = nilai.iddosen');
    $this->db->where('dosen.NIP',$nip);
    $this->db->where('jenis','Harian');
    return $this->db->get();
  }

  public function LihatNilaiUlangan($nip)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.idmahasiswa = nilai.idmahasiswa');
    $this->db->join('dosen', 'dosen.iddosen = nilai.iddosen');
    $this->db->where('dosen.NIP',$nip);
    $this->db->where('jenis','Ulangan');
    return $this->db->get();
  }

  public function LihatNilaiUAS($nip)
  {
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.idmahasiswa = nilai.idmahasiswa');
    $this->db->join('dosen', 'dosen.iddosen = nilai.iddosen');
    $this->db->where('dosen.NIP',$nip);
    $this->db->where('jenis','UAS');
    return $this->db->get();
  }

  public function CountAllMateri($id)
  {
    return $this->db->where('iddosen',$id)->from('materi')->count_all_results();
  }

  function fetch_document($path)
  {
    return get_filenames($path);
  }

  public function InsertFilename($filename)
  {
    $this->db->insert('materi',$filename);
  }

  public function HapusMateri($id)
  {
    $this->db->where('idMateri',$id);
    $this->db->delete('materi');
  }
  

  //Upload File

  public function select(){
    return $this->db->get('files');
}

public function insert($judul){
    $data = [
        'nama' => $this->input->post('judul'),
        'files' => $judul
    ];

    return $this->db->insert('files', $data);
}

public function delete($id){
    return $this->db->where('id', $id)->delete('files');   
}

public function getDataByID($id){
    return $this->db->get_where('files', ['id' => $id]);
}

public function updateFile($id, $data){
    return $this->db->where('id', $id)->update('files', $data);
}

}
