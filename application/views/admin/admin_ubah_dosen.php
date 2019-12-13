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
      <h4>Tambah Data dosen </h4>
    </div>
    <?php
      foreach ($dosen as $data) {
    ?>

      <div class="col-6 pt-4">
      <?php echo form_open('Admin/prosesUbahdosen'); ?>
        <input type="hidden" name="id" value="<?php echo $data['iddosen']; ?>">
        <div class="form-group row">
          <label for="NIP" class="col-sm-3 col-form-label">NIP</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $data['NIP']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="idmatkul" class="col-sm-3 col-form-label">Mata Kuliah</label>
          <div class="col-sm-9">
            <select class="form-control" name="idmatkul" id="idmatkul" required>
              <?php
                foreach ($matkul as $datamatkul) {
                  if($datamatkul['idmatkul'] == $data['idmatkul']){
                    echo "<option value='$datamatkul[idmatkul]' selected>$datamatkul[namamatkul]</option>";
                  }else{
                    echo "<option value='$datamatkul[idmatkul]'>$datamatkul[namamatkul]</option>";
                  }

                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['namadosen']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="hp" class="col-sm-3 col-form-label">No. HP</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="hp" id="hp" value="<?php echo $data['noHP']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea name="alamat" class="form-control"rows="3" required><?php echo $data['alamat']; ?></textarea>
          </div>
        </div>

      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Ubah',' class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamandosen" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close();
      }
    ?>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
