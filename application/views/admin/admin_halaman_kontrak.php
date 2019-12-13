<?php $this->load->view('template/header_table'); ?>


<div class="container" id="container">
<div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/title2.png ">
    </div>
  <div class="header clearfix">
  <?php $this->load->view('template/menu');?> 
     
  </div>
<div class="container" id="menu-top">
  <div class="row">
    <h4>Data Hubungan</h4>
  </div>
</div>
<div class="container header">
  <div class="row">
      <div class="col-6 pt-4">
        <?php
          if(isset($message))
          {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    $message
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
          }
        ?>
      <?php echo form_open('Admin/prosesTambahKontrak'); ?>
      <div class="form-group row">
        <label for="idKelas" class="col-sm-3 col-form-label">Kelas</label>
        <div class="col-sm-9">
          <select class="form-control" name="idKelas" id="idKelas" required>
            <?php
              foreach ($kelas as $dataKelas) {
                echo "<option value='$dataKelas[idKelas]'>$dataKelas[namaKelas]</option>";
                // echo "<input value='$dataKelas[idKelas]' placeholder='$dataKelas[namaKelas]' disabled>";
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="idmatkul" class="col-sm-3 col-form-label">Mata Kuliah</label>
        <div class="col-sm-9">
          <select class="form-control" name="idmatkul" id="idmatkul" required>
            <?php
              foreach ($matkul as $datamatkul) {
                echo "<option value='$datamatkul[idmatkul]'>$datamatkul[namamatkul]</option>";
              }
            ?>
          </select>
        </div>
      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Tambah','name="tambah" class="btn btn-info"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamanmahasiswa" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>
<div class="row">
  <div class="table-responsive pt-3">
    <table id="table"  class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Kelas</th>
          <th>Mata Kuliah</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($kontrak){
            $i = 1;
            foreach ($kontrak as $dataKontrak) {
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $dataKontrak['namaKelas'] ?></td>
          <td><?php echo $dataKontrak['namamatkul'] ?></td>
          <td id="body-table"><a class="btn btn-danger btn-sm" href="hapusKontrak/<?php echo $dataKontrak['idKontrak']; ?>">Hapus</a>
        </tr>
        <?php
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->load->view('template/footer_table'); ?>
