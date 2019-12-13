<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogin extends CI_Model{

  function check_admin($username, $password)
  {
    $query = $this->db->get_where('admin', array('username' => $username, 'password' => $password), 1, 0);

    if($query->num_rows() > 0)
    {
      return TRUE;
    }else{
      return FALSE;
    }
  }

  function check_dosen($username, $password)
  {
    $query = $this->db->get_where('dosen', array('NIP' => $username, 'password' => $password), 1, 0);

    if($query->num_rows() > 0)
    {
      return TRUE;
    }else{
      return FALSE;
    }
  }

  function check_mahasiswa($username, $password)
  {
    $query = $this->db->get_where('mahasiswa', array('NIM' => $username, 'password' => $password), 1, 0);

    if($query->num_rows() > 0)
    {
      return TRUE;
    }else{
      return FALSE;
    }
  }

}
