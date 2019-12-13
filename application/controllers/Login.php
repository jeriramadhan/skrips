<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function prosesLogin()
  {
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');

    if($this->form_validation->run() == TRUE)
    {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      if($this->ModelLogin->check_admin($username,$password) == TRUE)
      {
        $data = array('username'  => $username,
                      'role'  => 'admin',
                      'login'     => TRUE);
        $this->session->set_userdata($data);
        redirect('Index');
      }else if($this->ModelLogin->check_dosen($username,$password) == TRUE)
      {
        $data = array('username'  => $username,
                      'role'  => 'dosen',
                      'login'     => TRUE);
        $this->session->set_userdata($data);
        redirect('Index');
      }else if($this->ModelLogin->check_mahasiswa($username,$password) == TRUE)
      {
        $data = array('username'  => $username,
                      'role'  => 'mahasiswa',
                      'login'     => TRUE);
        $this->session->set_userdata($data);
        $this->session->set_userdata('nama',$data['namamahasiswa']);
        redirect('Index');
      }else{
        $data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Halaman Login';
        $data['message'] = "Username atau password salah";
        $this->load->view('login_form', $data);
      }
    }
  }

  public function prosesLogout()
  {
    $this->session->sess_destroy();
    redirect('Index','refresh');
  }

}
