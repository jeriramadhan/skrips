<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model{

  public function Tampildosen()
  {
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->join('matkul', 'matkul.idmatkul = dosen.idmatkul');
    return $this->db->get();
  }

  public function Tampilmahasiswa()
  {
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->join('kelas', 'kelas.idKelas = mahasiswa.idKelas');
    return $this->db->get();
  }
  

  public function TampilKontrak()
  {
    $this->db->select('*');
    $this->db->from('kontrak');
    $this->db->join('kelas', 'kelas.idKelas = kontrak.idKelas');
    $this->db->join('matkul', 'matkul.idmatkul = kontrak.idmatkul');
    return $this->db->get();
  }

  public function Tampilmatkul()
  {
    return $this->db->get('matkul');
  }

  public function TampilKelas()
  {
    return $this->db->get('kelas');
  }

  public function Hapusdosen($id)
  {
    $this->db->where('iddosen',$id);
    $this->db->delete('dosen');
  }

  public function Hapusmahasiswa($id)
  {
    $this->db->where('idmahasiswa',$id);
    $this->db->delete('mahasiswa');
  }

  public function Hapuskelas($id)
  {
    $this->db->where('idkelas',$id);
    $this->db->delete('kelas');
  }

  public function HapusKontrak($id)
  {
    $this->db->where('idKontrak',$id);
    $this->db->delete('kontrak');
  }

  /* DIPAKAI========================================================*/


  public function TampilDatadosen()
  {
    return $this->db->get('dosen');
  }

  public function TampilDatamahasiswa()
  {
    return $this->db->get('mahasiswa');
  }




  public function Getmatkul($id)
  {
    $this->db->where('idmatkul',$id);
    return $this->db->get('matkul');
  }

  public function GetKelas($id)
  {
    $this->db->where('idKelas',$id);
    return $this->db->get('kelas');
  }

  public function Lihatdosen($id)
  {
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->join('matkul', 'matkul.idmatkul = dosen.idmatkul');
    $this->db->where('iddosen',$id);
    return $this->db->get();
  }

  public function Lihatmahasiswa($id)
  {
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->join('kelas', 'kelas.idKelas = mahasiswa.idKelas');
    $this->db->where('idmahasiswa',$id);
    return $this->db->get();
  }

  public function Lihatkelas($id)
  {
    $this->db->select('*');
    $this->db->from('kelas');
    $this->db->join('kelas', 'kelas.idKelas = mahasiswa.idKelas');
    $this->db->where('idmahasiswa',$id);
    return $this->db->get();
  }


  public function Insertdosen($data)
  {
    $this->db->insert('dosen',$data);
  }

  public function InsertKontrak($data)
  {
    $this->db->insert('kontrak',$data);
  }

  public function Insertmahasiswa($data)
  {
    $this->db->insert('mahasiswa',$data);
  }

  public function Insertkelas($data)
  {
    $this->db->insert('kelas',$data);
  }

  public function Ubahkelas($data,$id)
  {
    $this->db->where('idkelas',$id);
    $this->db->update('kelas',$data);
  }


  public function Ubahdosen($data,$id)
  {
    $this->db->where('iddosen',$id);
    $this->db->update('dosen',$data);
  }

  public function UbahPassworddosen($data,$id)
  {
    $this->db->where('iddosen',$id);
    $this->db->update('dosen',$data);
  }

  public function Ubahmahasiswa($data,$id)
  {
    $this->db->where('idmahasiswa',$id);
    $this->db->update('mahasiswa',$data);
  }

  public function UbahPasswordmahasiswa($data,$id)
  {
    $this->db->where('idmahasiswa',$id);
    $this->db->update('mahasiswa',$data);
  }


  function check_kontrak($idKelas, $idmatkul)
  {
    $query = $this->db->get_where('kontrak', array('idKelas' => $idKelas, 'idmatkul' => $idmatkul), 1, 0);

    if($query->num_rows() > 0)
    {
      return TRUE;
    }else{
      return FALSE;
    }
  }


  public function CountAlldosen()
  {
    return $this->db->count_all('dosen');
  }

  public function GetAlldosen($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->join('matkul', 'matkul.idmatkul = dosen.idmatkul');
    return $this->db->get();
  }

  public function CountAllmahasiswa()
  {
    return $this->db->count_all('mahasiswa');
  }

  public function CountAllKelas()
  {
    return $this->db->count_all('kelas');
  }

  public function GetAllmahasiswa($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->join('kelas', 'kelas.idKelas = mahasiswa.idKelas');
    return $this->db->get();
  }

  public function CountAllKontrak()
  {
    return $this->db->count_all('kontrak');
  }

  public function GetAllKontrak($limit, $start)
  {
    $this->db->limit($limit, $start);
    $this->db->select('*');
    $this->db->from('kontrak');
    $this->db->join('kelas', 'kelas.idKelas = kontrak.idKelas');
    $this->db->join('matkul', 'matkul.idmatkul = kontrak.idmatkul');
    return $this->db->get();
  }
}
