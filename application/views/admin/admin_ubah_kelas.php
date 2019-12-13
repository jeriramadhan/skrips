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
    <div class="col-12 pb-2">
      <h4>Tambah Data Kelas </h4>
    </div>
    <?php
      foreach ($kelas as $datakelas) {
    ?>

      <div class="col-6 pt-4">
      <?php echo form_open('Admin/prosesUbahkelas'); ?>
        <input type="hidden" name="id" value="<?php echo $datakelas['idkelas']; ?>">
        <div class="form-group row">
          <label for="namaKelas" class="col-sm-3 col-form-label">Nama Kelas</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="namaKelas" id="namaKelas" value="<?php echo $datakelas['namaKelas']; ?>" required>
          </div>
        </div>

      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Ubah',' class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamankelas" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close();
      }
    ?>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
