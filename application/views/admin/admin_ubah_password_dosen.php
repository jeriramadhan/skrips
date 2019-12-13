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
      <h4>Ubah Akun dosen </h4>
    </div>
    <?php
      foreach ($dosen as $data) {
    ?>

      <div class="col-6 pt-4">
      <?php echo form_open('Admin/prosesUbahPassworddosen'); ?>
        <input type="hidden" name="id" value="<?php echo $data['iddosen']; ?>">
        <div class="form-group row">
          <label for="NIP" class="col-sm-3 col-form-label">NIP</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $data['NIP']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="namadosen" class="col-sm-3 col-form-label">Nama Dosen</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="namadosen" id="namadosen" value="<?php echo $data['namadosen']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="password" id="password" value="<?php echo $data['password']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-7 text-right">
        <?php echo form_submit('submit','Ubah',' class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamanAkun" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close();
      }
    ?>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
