<?php $this->load->view('template/header_table'); ?>


<div class="container" id="container">
<div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/title2.png ">
    </div>
  <?php $this->load->view('template/menu');?> 
    
  </div>
  <div class="container">
        <div class="row">
        <h5>Selamat Datang di Web Pembelajaran Temu Kembali Informasi <br> Pendidikan Teknik Informatika dan Komputer Universitas Negeri Jakarta, <?php echo $this->session->userdata('username');?></h5>
        </div>
      </div>
      <div class="container">
        <div class="row">
        </div>
        </div>
    </div>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
