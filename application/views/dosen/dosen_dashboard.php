<?php $this->load->view('template/header_admin'); ?>


<div class="container" id="container">
<div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/title2.png ">
    </div>
  <div class="header clearfix">
  <?php $this->load->view('template/menu');?> 
  </div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header">
          &nbsp;
        </div>
        <div class="card-body">
          <h5 class="card-title">Selamat datang, <?php echo $username; ?></h5>

        </div>
        <div class="card-footer text-muted">
          2019 &copy; Web Pembelajaran TKI. All rights reserved
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
