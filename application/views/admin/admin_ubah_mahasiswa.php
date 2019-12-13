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
      <h4>Tambah Data mahasiswa </h4>
    </div>
    <?php
      foreach ($mahasiswa as $data) {
    ?>

      <div class="col-6 pt-4">
      <?php echo form_open('Admin/prosesUbahmahasiswa'); ?>
        <input type="hidden" name="id" value="<?php echo $data['idmahasiswa']; ?>">
        <div class="form-group row">
          <label for="NIM" class="col-sm-3 col-form-label">NIM</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIM" id="NIM" value="<?php echo $data['NIM']; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="idKelas" class="col-sm-3 col-form-label">Kelas</label>
          <div class="col-sm-9">
            <select class="form-control" name="idKelas" id="idKelas" required>
              <?php
                foreach ($kelas as $dataKelas) {
                  if($dataKelas['idKelas'] == $data['idKelas']){
                    echo "<option value='$dataKelas[idKelas]' selected>$dataKelas[namaKelas]</option>";
                  }else{
                    echo "<option value='$dataKelas[idKelas]'>$dataKelas[namaKelas]</option>";
                  }

                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['namamahasiswa']; ?>" required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea name="alamat" class="form-control"rows="3" required><?php echo $data['alamatmahasiswa']; ?></textarea>
          </div>
        </div>

      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Ubah',' class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamanmahasiswa" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close();
      }
    ?>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
