<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index2 extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		//Codeigniter : Write Less Do More
	}
	

	public function index()
	{
		if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Dashboard Admin';
			$data['username'] = $this->session->userdata('username');
			
			$this->load->view('admin/admin_dashboard', $data);
		}else if($this->session->userdata('role') == 'dosen' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Dashboard dosen';
			$data['username'] = $this->session->userdata('username');
			
			$this->load->view('dosen/dosen_dashboard', $data);
		}else if($this->session->userdata('role') == 'mahasiswa' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Dashboard mahasiswa';
			$data['username'] = $this->session->userdata('username');
			
			$this->load->view('mahasiswa/mahasiswa_dashboard', $data);
		}else{
			$data['title'] = 'Web Pembelajaran TKI PTIK UNJ | Halaman Login';
			$this->load->view('login_form', $data);
		}
	}
	
	
}
