<?php $this->load->view('template/header_admin'); ?>


<div class="container" id="container">
<div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/title2.png ">
    </div>
  <div class="header clearfix">
  <?php $this->load->view('template/menu');?> 
  <!-- <style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;} 
</style>-->
    
    
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
