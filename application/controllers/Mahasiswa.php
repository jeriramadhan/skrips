<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller{

  public function halamanNilai()
  {
    if($this->session->userdata('role') == 'mahasiswa' && $this->session->userdata('login') == TRUE) {
    $id = $this->session->userdata('username');
    $query = $this->Modelmahasiswa->Lihatmahasiswa($id)->result_array();
    foreach ($query as $mahasiswa) {
      $idmahasiswa =  $mahasiswa['idmahasiswa'];
    }
    $query = $this->Modelmahasiswa->LihatNilaiHarian($idmahasiswa);
		$data['harian'] = $query->result_array();

    $query = $this->Modelmahasiswa->LihatNilaiUlangan($idmahasiswa);
		$data['ulangan'] = $query->result_array();

    $query = $this->Modelmahasiswa->LihatNilaiUAS($idmahasiswa);
		$data['uas'] = $query->result_array();

    $query = $this->Modelmahasiswa->Lihatmahasiswa($id);
    $data['mahasiswa'] = $query->result_array();

    $query = $this->Modelmahasiswa->Tampilmatkul();
		$data['matkul'] = $query->result_array();

    $query = $this->Modelmahasiswa->TampilKelas();
		$data['kelas'] = $query->result_array();

    $query = $this->Modelmahasiswa->TampilKontrak($id);
    $data['kontrak'] = $query->result_array();

    $data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Data Nilai';
		$this->load->view('mahasiswa/mahasiswa_halaman_nilai', $data);
  }else{
    echo "Forbidden";
  }
}

  public function halamanMateri()
  {
    if($this->session->userdata('role') == 'mahasiswa' && $this->session->userdata('login') == TRUE) {
    $id = $this->session->userdata('username');
    $query = $this->Modelmahasiswa->Lihatmahasiswa($id)->result_array();
    foreach ($query as $mahasiswa) {
      $idmahasiswa =  $mahasiswa['idmahasiswa'];
    }
    $query = $this->Modelmahasiswa->TampilMateri($idmahasiswa);
    $data['materi'] = $query->result_array();

    $query = $this->Modelmahasiswa->Lihatmahasiswa($id);
    $data['mahasiswa'] = $query->result_array();

    $query = $this->Modelmahasiswa->Tampilmatkul();
		$data['matkul'] = $query->result_array();

    $query = $this->Modelmahasiswa->TampilKelas();
		$data['kelas'] = $query->result_array();

    $query = $this->Modelmahasiswa->TampilKontrak($id);
    $data['kontrak'] = $query->result_array();

    $data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Data Nilai';
		$this->load->view('mahasiswa/mahasiswa_halaman_materi', $data);
  }else{
    echo "Forbidden";
  }
}

  public function halamanRekap()
  {
    if($this->session->userdata('role') == 'mahasiswa' && $this->session->userdata('login') == TRUE) {
    $id = $this->session->userdata('username');
    $query = $this->Modelmahasiswa->Lihatmahasiswa($id)->result_array();
    foreach ($query as $mahasiswa) {
      $idmahasiswa =  $mahasiswa['idmahasiswa'];
    }
    $query = $this->Modelmahasiswa->TampilMateri($idmahasiswa);
    $data['materi'] = $query->result_array();

    $query = $this->Modelmahasiswa->Lihatmahasiswa($id);
    $data['mahasiswa'] = $query->result_array();

    $query = $this->Modelmahasiswa->Tampilmatkul();
		$data['matkul'] = $query->result_array();

    $query = $this->Modelmahasiswa->TampilKelas();
		$data['kelas'] = $query->result_array();

    $query = $this->Modelmahasiswa->TampilKontrak($id);
    $data['kontrak'] = $query->result_array();

    $data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Data Nilai';
		$this->load->view('mahasiswa/mahasiswa_halaman_rekap', $data);
  }else{
    echo "Forbidden";
  }
}
}
