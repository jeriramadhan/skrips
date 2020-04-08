<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dosen extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  
  function index()
  {
    
  }
  
  public function halamanUbahNilai($id)
  {
    if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Ubah Nilai";
      $query = $this->Modeldosen->TampilNilai($id);
      $data['nilai'] = $query->result_array();
      $this->load->view('dosen/dosen_ubah_nilai', $data);
    }else{
      echo "Forbidden";
    }
  }
  
  public function prosesUbahNilai()
  {
    if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
      $id = $this->input->post('id');
      $this->form_validation->set_rules('nilai','Nilai','required');
      
      if($this->form_validation->run() === TRUE)
      {
        $insertData = array(
          'nilai'=>$this->input->post('nilai')
        );
        $this->Modeldosen->UbahNilai($insertData,$id);
        redirect('dosen/halamanNilai');
      } else {
        $this->load->view('dosen/dosen_ubah_nilai');
      }
    }else{
      echo "Forbidden";
    }
  }
  
  public function hapusNilai($id)
  {
    if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
      $this->Modeldosen->HapusNilai($id);
      redirect('dosen/halamanNilai');
    }else{
      echo "forbidden";
    }
  }
  
  public function halamanMateri()
  {
    if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Data Materi";
      $data['username'] = $this->session->userdata('username');
      $id = $this->session->userdata('username');
      $query = $this->Modeldosen->Lihatdosen($id)->result_array();
      foreach ($query as $dosen) {
        $iddosen =  $dosen['iddosen'];
      }
      $query = $this->Modeldosen->TampilDatamatkul();
      $data['matkul'] = $query->result_array();
      $query = $this->Modeldosen->Lihatdosen($id);
      $data['dosen'] = $query->result_array();
      $query = $this->Modeldosen->TampilMateri($iddosen);
      $data['materi'] = $query->result_array();
      
      $this->load->view('dosen/dosen_halaman_materi', $data);
    }else if($this->session->userdata('role') == 'admin'){
      $query = $this->Modeldosen->TampilDatamatkul();
      $data['matkul'] = $query->result_array();
      $query = $this->Modeldosen->Lihatdosen($id);
      $data['dosen'] = $query->result_array();
      $query = $this->Modeldosen->TampilMateri($iddosen);
      $data['materi'] = $query->result_array();
      $this->load->view('dosen/dosen_halaman_materi', $data);
    }else{
      echo "forbidden";
    }
  }
  
  public function halamanNilai()
  {
    if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Kelola Nilai";
      $id = $this->session->userdata('username');
      $data['username'] = $id;
      $query = $this->Modeldosen->LihatNilaiHarian($id);
      $data['harian'] = $query->result_array();
      
      $query = $this->Modeldosen->LihatNilaiUlangan($id);
      $data['ulangan'] = $query->result_array();
      
      $query = $this->Modeldosen->LihatNilaiUAS($id);
      $data['uas'] = $query->result_array();
      
      $query = $this->Modeldosen->TampilDatamatkul();
      $data['matkul'] = $query->result_array();
      
      $query = $this->Modeldosen->TampilDataKelas();
      $data['kelas'] = $query->result_array();
      
      
      
      $query = $this->Modeldosen->TampilDatamahasiswa($id);
      $data['mahasiswa'] = $query->result_array();
      
      $query = $this->Modeldosen->Lihatdosen($id);
      $data['dosen'] = $query->result_array();
      
      $query = $this->Modeldosen->TampilKontrak($id);
      $data['kontrak'] = $query->result_array();
      
      $this->load->view('dosen/dosen_halaman_nilai',$data);
    }
    else{
      echo "forbidden";
    }
  }
  
  public function halamanTambahMateri()
  {
    
  }
  
  public function prosesTambahMateri()
  {
    if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
      $deskripsi = $this->input->post('deskripsi');
      $judul = $this->input->post('judul');
      $id = $this->input->post('id');
      $config['upload_path'] = './assets/uploads';
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = 0;
      
      $this->load->library('upload', $config);
      
      if(!$this->upload->do_upload())
      {
        $data['message'] = $this->upload->display_errors();
      }else{
        $data['upload_data'] = $this->upload->data();
        $data['message'] = 'Upload gambar sukses!';
      }
      
      $query = $this->Modeldosen->Lihatdosen($id)->result_array();
      foreach ($query as $dosen) {
        $iddosen =  $dosen['iddosen'];
      }
      $this->get_uri_image($deskripsi,$iddosen,$judul);
      $this->halamanMateri();
    }else{
      echo "Forbidden";
    }
  }
  
  public function get_uri_image($deskripsi,$iddosen,$judul,$row)
  {
    if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
      $filename = $this->Modeldosen->fetch_document(FCPATH.'assets/uploads');
      foreach ($filename as $row) {
        $insertData = array(
          'idMateri'=>null,
          'iddosen'=>$iddosen,
          'judulFile'=>$judul,
          'deskripsi'=>$deskripsi,
          'lokasiFile'=>'assets/uploads/'.$row
        );
      }
      $this->Modeldosen->InsertFilename($insertData);
    }else{
      echo "forbidden";
    }
  }
  
  public function hapusMateri($id)
  {
    if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
      $this->Modeldosen->HapusMateri($id);
      redirect('dosen/halamanMateri');
    }else{
      echo "forbidden";
    }
  }
  
  public function prosesTambahNilai()
  {
    if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
      $id = $this->input->post('id');
      $jenis = $this->input->post('jenis');
      $query = $this->Modeldosen->Lihatdosen($id)->result_array();
      foreach ($query as $dosen) {
        $iddosen =  $dosen['iddosen'];
      }
      $this->form_validation->set_rules('idmatkul','matkul','required');
      $this->form_validation->set_rules('idKelas','Kelas','required');
      $this->form_validation->set_rules('idmahasiswa','Nama','required');
      $this->form_validation->set_rules('nilai','nilai','required');
      
      if($this->form_validation->run() === TRUE && $this->input->post('idKelas') != 0 && $this->input->post('idmahasiswa') != 0)
      {
        $insertData = array(
          'idmahasiswa'=>$this->input->post('idmahasiswa'),
          'iddosen'=>$iddosen,
          'idKelas'=>$this->input->post('idKelas'),
          'jenis'=>$jenis,
          'nilai'=>$this->input->post('nilai')
        );
        $this->Modeldosen->InsertNilai($insertData);
        redirect('dosen/halamanNilai');
      } else {
        $query = $this->Modeldosen->LihatNilaiHarian($id);
        $data['harian'] = $query->result_array();
        
        $query = $this->Modeldosen->LihatNilaiUlangan($id);
        $data['ulangan'] = $query->result_array();
        
        $query = $this->Modeldosen->LihatNilaiUAS($id);
        $data['uas'] = $query->result_array();
        
        $query = $this->Modeldosen->TampilDatamatkul();
        $data['matkul'] = $query->result_array();
        
        $query = $this->Modeldosen->TampilDataKelas();
        $data['kelas'] = $query->result_array();
        
        $id = $this->session->userdata('username');
        
        $query = $this->Modeldosen->TampilDatamahasiswa($id);
        $data['mahasiswa'] = $query->result_array();
        
        $query = $this->Modeldosen->Lihatdosen($id);
        $data['dosen'] = $query->result_array();
        
        $query = $this->Modeldosen->TampilKontrak($id);
        $data['kontrak'] = $query->result_array();
        
        $this->load->view('dosen/dosen_halaman_nilai',$data);
      }
    }else{
      echo "forbidden";
    }
  }
}
