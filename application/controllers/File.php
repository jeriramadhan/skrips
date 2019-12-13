<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	public function index() {
      $data['files'] = $this->Modeldosen->select()->result();
		// $data['files']	= $this->Modeldosen->select()->result();
		$data['error']  = '';

		$this->load->view('file/index', $data);
	}

	public function upload() {
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'pdf|PDF';
		$config['max_size']             = 99048;

		$this->load->library('upload', $config);

		if (! $this->upload->do_upload('file')) {
			redirect(base_url()); // Jika file upload tidak ada akan redirect

		} else {

			$upload_data 	= $this->upload->data();
			$name 			= $upload_data['file_name'];
			$insert 		= $this->Modeldosen->insert($name);

			if ($insert) {
				redirect(base_url());
			} else {
				echo "Gagal Upload";
			}
		}
	}

	public function add() {
		$this->load->view('file/halaman_tambah');
	}

	public function delete($id) {
		$data = $this->Modeldosen->getDataByID($id)->row();
		$nama = './uploads/'.$data->files;

		if(is_readable($nama) && unlink($nama)) {
			$this->Modeldosen->delete($id);
			redirect(base_url());
		} else {
			echo "Gagal Hapus File";
		}
	}

	public function edit($id) {
		$data['data'] = $this->Modeldosen->getDataByID($id)->row();
		$this->load->view('file/halaman_edit', $data);
	}

	public function update() {
		$id 	= $this->input->post('id');
		$data 	= $this->Modeldosen->getDataByID($id)->row();
		$nama 	= './uploads/'.$data->files;
		$judul 	= $this->input->post("judul", TRUE);
		
		if (is_readable($nama)) {
			$upload_file = $_FILES['file']['name'];
		
			if ($upload_file) {
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'pdf|PDF';
				$config['max_size']             = 99048;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file') && unlink($nama)) {
					$file_baru = $this->upload->data('file_name');
					$this->db->set('files', $file_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}
		}

		$this->db->set('nama', $judul);
		$this->db->where('id', $id)->update('files');
		redirect(base_url());
	}
}
