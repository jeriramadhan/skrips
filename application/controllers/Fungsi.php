<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi extends CI_Controller{
  public function stemming(){
    if($this->session->userdata('role') == 'mahasiswa' || $this->session->userdata('role') == 'dosen' ||$this->session->userdata('role') == 'admin' &&$this->session->userdata('login') == TRUE) {
      $this->load->view('fungsi/stemming');
    }else{
      echo "Forbidden";
    }
  }
  
  public function stopword(){
    if($this->session->userdata('role') == 'mahasiswa' ||$this->session->userdata('role') == 'dosen' ||$this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->load->view('fungsi/stopword');
    }else{
      echo "Forbidden";
    }
  }
  
  public function tfidf(){
    if($this->session->userdata('role') == 'mahasiswa' ||$this->session->userdata('role') == 'dosen' ||$this->session->userdata('role') == 'admin' ||$this->session->userdata('login') == TRUE) {
      $this->load->view('fungsi/tfidf');
    }else{
      echo "Forbidden";
    }
  }
  
  function action_stopword(){
    if($this->session->userdata('role') == 'mahasiswa' ||$this->session->userdata('role') == 'dosen' ||$this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->load->view('fungsi/proses_stopword');
    }else{
      echo "Forbidden";
    }
  }
  
  function hasil_tfidf(){
    if($this->session->userdata('role') == 'mahasiswa' ||$this->session->userdata('role') == 'dosen' ||$this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->load->view('fungsi/hasil_tfidf');
    }else{
      echo "Forbidden";
    }
  }
  
  function action_tfidf(){
    if($this->session->userdata('role') == 'mahasiswa' ||$this->session->userdata('role') == 'dosen' ||$this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
      $this->load->view('fungsi/proses_tfidf');
    }else{
      echo "Forbidden";
    }
  }
}