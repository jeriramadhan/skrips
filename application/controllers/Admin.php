<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  
  public function __construct()
  {
    parent::__construct();
  }
  
  /*================ dosen ================*/
  
  function halamandosen()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $query = $this->ModelAdmin->Tampildosen();
      $data['dosen'] = $query->result_array();
      $query = $this->ModelAdmin->Tampilmatkul();
      $data['matkul'] = $query->result_array();
      
      $data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Data dosen';
      $this->load->view('admin/admin_halaman_dosen', $data);
    }else{
      echo "Anda Tidak Bisa Mengakses Halaman Ini";
    }
  }
  
  public function prosesTambahdosen()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->form_validation->set_rules('NIP','NIP','required');
      $this->form_validation->set_rules('idmatkul','matkul','required');
      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('hp','No HP','required');
      $this->form_validation->set_rules('alamat','Alamat','required');
      $password = random_string('alnum', 8);
      
      if($this->form_validation->run() === TRUE)
      {
        $insertData = array(
          'iddosen'=>NULL,
          'NIP'=>$this->input->post('NIP'),
          'idmatkul'=>$this->input->post('idmatkul'),
          'namadosen'=>$this->input->post('nama'),
          'password'=>$password,
          'noHP'=>$this->input->post('hp'),
          'alamat'=>$this->input->post('alamat')
        );
        $this->ModelAdmin->Insertdosen($insertData);
        redirect('Admin/halamandosen');
      } else {
        $this->load->view('admin/admin_halaman_dosen');
      }
    }
  }
  
  public function halamanUbahdosen($id)
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Ubah dosen";
      $query = $this->ModelAdmin->Lihatdosen($id);
      $data['dosen'] = $query->result_array();
      $query = $this->ModelAdmin->Tampilmatkul();
      $data['matkul'] = $query->result_array();
      $this->load->view('admin/admin_ubah_dosen', $data);
    }else{
      echo "Anda Tidak Bisa Masuk Halaman Ini";
    }
  }
  
  public function hapusdosen($id)
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) { 
      $this->ModelAdmin->Hapusdosen($id);
      redirect('Admin/halamandosen');
    }else{
      echo "Anda Tidak Bisa Masuk Halaman Ini";
    }
  }
  /*================Kelas============*/
  public function halamankelas()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      
      $query = $this->ModelAdmin->TampilKelas();
      $data['kelas'] = $query->result_array();
      // $query = $this->ModelAdmin->TampilKelas();
      // $data['kelas'] = $query->result_array();
      
      $data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Data dosen';
      $this->load->view('admin/admin_halaman_kelas', $data);
    }else{
      echo "Forbidden";
    }
  }
  
  public function prosesTambahkelas()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->form_validation->set_rules('namaKelas','Angkatan/Kelas','required');
      
      if($this->form_validation->run() === TRUE)
      {
        $insertData = array(
          'idkelas'=>NULL,
          'namaKelas'=>$this->input->post('namaKelas')
        );
        $this->ModelAdmin->Insertkelas($insertData);
        redirect('Admin/halamankelas');
      } else {
        $this->load->view('admin/admin_halaman_kelas');
      }
    }else{
      echo "Forbidden";
    }
  }
  
  public function halamanUbahkelas($id)
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Ubah Kelas";
      $query = $this->ModelAdmin->Lihatkelas($id);
      $data['kelas'] = $query->result_array();
      // $query = $this->ModelAdmin->TampilKelas();
      // $data['kelas'] = $query->result_array();
      $this->load->view('admin/admin_ubah_kelas', $data);
    }else{
      echo "Forbidden";
    }
  }
  
  public function hapuskelas($id)
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->ModelAdmin->HapusKelas($id);
      redirect('Admin/halamankelas');
    }else{
      echo "Forbidden";
    }
  }
  
  /*================ mahasiswa ================*/
  
  public function halamanmahasiswa()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $query = $this->ModelAdmin->Tampilmahasiswa();
      $data['mahasiswa'] = $query->result_array();
      $query = $this->ModelAdmin->TampilKelas();
      $data['kelas'] = $query->result_array();
      
      $data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Data mahasiswa';
      $this->load->view('admin/admin_halaman_mahasiswa', $data);
    }else{
      echo "Forbidden";
    }
  }
  
  public function prosesTambahmahasiswa()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->form_validation->set_rules('NIM','NIM','required');
      $this->form_validation->set_rules('idKelas','Kelas','required');
      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('alamat','Alamat','required');
      $password = random_string('alnum', 8);
      
      if($this->form_validation->run() === TRUE)
      {
        $insertData = array(
          'idmahasiswa'=>NULL,
          'NIM'=>$this->input->post('NIM'),
          'idKelas'=>$this->input->post('idKelas'),
          'namamahasiswa'=>$this->input->post('nama'),
          'password'=>$password,
          'alamatmahasiswa'=>$this->input->post('alamat')
        );
        $this->ModelAdmin->Insertmahasiswa($insertData);
        redirect('Admin/halamanmahasiswa');
      } else {
        $this->load->view('admin/admin_halaman_mahasiswa');
      }
    }else{
      echo "Forbidden";
    }
  }
  
  public function halamanUbahmahasiswa($id)
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Ubah mahasiswa";
      $query = $this->ModelAdmin->Lihatmahasiswa($id);
      $data['mahasiswa'] = $query->result_array();
      $query = $this->ModelAdmin->TampilKelas();
      $data['kelas'] = $query->result_array();
      $this->load->view('admin/admin_ubah_mahasiswa', $data);
    }else{
      echo "Forbidden";
    }
  }
  
  public function hapusmahasiswa($id)
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->ModelAdmin->Hapusmahasiswa($id);
      redirect('Admin/halamanmahasiswa');
    }else{
      echo "Forbidden";
    }
  }
  
  
  /*================ KONTRAK ================*/
  
  public function halamanKontrak()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $query = $this->ModelAdmin->TampilKontrak();
      $data['kontrak'] = $query->result_array();
      $query = $this->ModelAdmin->TampilKelas();
      $data['kelas'] = $query->result_array();
      $query = $this->ModelAdmin->Tampilmatkul();
      $data['matkul'] = $query->result_array();
      
      $data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Data Kontrak';
      $this->load->view('admin/admin_halaman_kontrak', $data);
    }else{
      echo "Forbidden";
    }
  }
  
  public function prosesTambahKontrak()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->form_validation->set_rules('idmatkul','matkul','required');
      $this->form_validation->set_rules('idKelas','Kelas','required');
      
      if($this->form_validation->run() === TRUE)
      {
        $idKelas = $this->input->post('idKelas');
        $idmatkul = $this->input->post('idmatkul');
        
        $data_kelas = $this->ModelAdmin->GetKelas($idKelas)->result();
        $data_matkul = $this->ModelAdmin->Getmatkul($idmatkul)->result();
        foreach ($data_kelas as $kelas) {
          $namaKelas = $kelas->namaKelas;
        }
        foreach ($data_matkul as $matkul) {
          $namamatkul = $matkul->namamatkul;
        }
        if($this->ModelAdmin->check_kontrak($idKelas,$idmatkul) == FALSE)
        {
          $insertData = array(
            'idKontrak'=>NULL,
            'idmatkul'=>$this->input->post('idmatkul'),
            'idKelas'=>$this->input->post('idKelas')
          );
          $this->ModelAdmin->InsertKontrak($insertData);
          redirect('Admin/halamanKontrak');
        }else{
          $data['message'] = "Kelas ".$namaKelas." sudah mengontrak Mata Kuliah ".$namamatkul;
          
          $query = $this->ModelAdmin->TampilKontrak();
          $data['kontrak'] = $query->result_array();
          $query = $this->ModelAdmin->TampilKelas();
          $data['kelas'] = $query->result_array();
          $query = $this->ModelAdmin->Tampilmatkul();
          $data['matkul'] = $query->result_array();
          
          $data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Data Kontrak';
          $this->load->view('admin_halaman_kontrak',$data);
        }
      } else {
        $this->load->view('admin_halaman_kontrak');
      }
    }else{
      echo "Forbidden";
    }
  }
  
  public function hapusKontrak($id)
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->ModelAdmin->HapusKontrak($id);
      redirect('Admin/halamanKontrak');
    }else{
      echo "Forbidden";
    }
  }
  
  /* DIPAKAI========================================================*/
  
  
  public function halamanAkun()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $query = $this->ModelAdmin->TampilDatadosen();
      $data['dosen'] = $query->result_array();
      
      $query = $this->ModelAdmin->TampilDatamahasiswa();
      $data['mahasiswa'] = $query->result_array();
      
      $this->load->view('admin/admin_halaman_akun', $data);
    }
    else{
      echo "Forbidden";
    }
  }
  
  public function halamanTambahmahasiswa()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Tambah mahasiswa";
      
      $query = $this->ModelAdmin->TampilKelas();
      $data['kelas'] = $query->result_array();
      
      $this->load->view('admin_tambah_mahasiswa', $data);
    }else{
      echo "Forbidden";
    }
  }
  
  public function halamanTambahKontrak()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Tambah Kontrak";
      $query = $this->ModelAdmin->TampilKelas();
      $data['kelas'] = $query->result_array();
      
      $query = $this->ModelAdmin->Tampilmatkul();
      $data['matkul'] = $query->result_array();
      $this->load->view('admin_tambah_kontrak', $data);
    }else{
      
    }
  }
  
  public function halamanUbahPassworddosen($id)
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Ubah dosen";
      $query = $this->ModelAdmin->Lihatdosen($id);
      $data['dosen'] = $query->result_array();
      $this->load->view('admin_ubah_password_dosen', $data);
    }else{
      
    }
  }
  
  public function halamanUbahPasswordmahasiswa($id)
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Ubah mahasiswa";
      $query = $this->ModelAdmin->Lihatmahasiswa($id);
      $data['mahasiswa'] = $query->result_array();
      $this->load->view('admin_ubah_password_mahasiswa', $data);
    }else{
      
    }
  }
  
  public function prosesUbahdosen()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $id = $this->input->post('id');
      $this->form_validation->set_rules('NIP','NIP','required');
      $this->form_validation->set_rules('idmatkul','matkul','required');
      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('hp','No HP','required');
      $this->form_validation->set_rules('alamat','Alamat','required');
      
      if($this->form_validation->run() === TRUE)
      {
        $insertData = array(
          'NIP'=>$this->input->post('NIP'),
          'idmatkul'=>$this->input->post('idmatkul'),
          'namadosen'=>$this->input->post('nama'),
          'noHP'=>$this->input->post('hp'),
          'alamat'=>$this->input->post('alamat')
        );
        $this->ModelAdmin->Ubahdosen($insertData,$id);
        redirect('Admin/halamandosen');
      } else {
        $this->load->view('admin_ubah_dosen');
      }
    }else{
      
    }
  }
  
  public function prosesUbahPassworddosen()
  {
    $id = $this->input->post('id');
    $this->form_validation->set_rules('NIP','NIP','required');
    $this->form_validation->set_rules('password','Pasword','required');
    
    if($this->form_validation->run() === TRUE)
    {
      $insertData = array(
        'NIP'=>$this->input->post('NIP'),
        'password'=>$this->input->post('password')
      );
      $this->ModelAdmin->UbahPassworddosen($insertData,$id);
      redirect('Admin/halamanAkun');
    } else {
      $this->load->view('admin_ubah_password_dosen');
    }
  }
  
  public function prosesUbahPasswordmahasiswa()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $id = $this->input->post('id');
      $this->form_validation->set_rules('NIM','NIM','required');
      $this->form_validation->set_rules('password','Pasword','required');
      
      if($this->form_validation->run() === TRUE)
      {
        $insertData = array(
          'NIM'=>$this->input->post('NIM'),
          'password'=>$this->input->post('password')
        );
        $this->ModelAdmin->UbahPasswordmahasiswa($insertData,$id);
        redirect('Admin/halamanAkun');
      } else {
        $this->load->view('admin_ubah_password_mahasiswa');
      }
    }else{
      echo "Forbidden";
    }
  }
  
  public function prosesUbahmahasiswa()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $id = $this->input->post('id');
      $this->form_validation->set_rules('NIM','NIM','required');
      $this->form_validation->set_rules('idKelas','Kelas','required');
      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('alamat','Alamat','required');
      
      if($this->form_validation->run() === TRUE)
      {
        $insertData = array(
          'NIM'=>$this->input->post('NIM'),
          'idKelas'=>$this->input->post('idKelas'),
          'namamahasiswa'=>$this->input->post('nama'),
          'alamatmahasiswa'=>$this->input->post('alamat')
        );
        $this->ModelAdmin->Ubahmahasiswa($insertData,$id);
        redirect('Admin/halamanmahasiswa');
      } else {
        $this->load->view('admin_ubah_mahasiswa');
      }
    }else{
      echo "Forbidden";
    }
  }
  
  public function halaman404()
  {
    $data['title'] = "Web Pembelajaran TKI PTIK UNJ | Halaman tidak ditemukan";
    $this->load->view('404', $data);
  }
  
  
}
