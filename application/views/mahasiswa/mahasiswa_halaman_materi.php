<?php $this->load->view('template/header_table'); ?>


<div class="container" id="container">
<div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/title2.png ">
    </div>
  <div class="header clearfix">
  <?php $this->load->view('template/menu');?> 
    
  </div>
      <div class="container">
        <div class="row">
          <!-- <h3>Simulasi Stopword Removal</h3> -->
          <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

<!-- <style media="screen">
  h2{
    text-align: center;
  }

  .text{
    width: 75%;
    margin: auto;
  }
  .hasil{
    width: 75%;
  margin: auto;
  }
  .hasil h2{
    text-align: center2
  }
  .text button{
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 10px;
  }
  textarea{
    resize: none;
  } -->
</style>
<div class="container header">
  <div class="row">
      <div class="col-6 pt-4">
        <?php
          foreach ($mahasiswa as $datamahasiswa) {
        ?>
        <div class="form-group row">
          <label for="NIM" class="col-sm-3 col-form-label">NIM</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIM" id="NIM" value="<?php echo $datamahasiswa['NIM']?>" disabled required>
          </div>
        </div>
        <div class="form-group row">
          <label for="Nama" class="col-sm-3 col-form-label">Nama mahasiswa</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="Nama" value="<?php echo $datamahasiswa['namamahasiswa']?>" disabled required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
          <div class="col-sm-9">
            <?php
              foreach ($kelas as $dataKelas) {
                if($dataKelas['idKelas'] == $datamahasiswa['idKelas']){
                  $ampuKelas = $dataKelas['idKelas'];
                  echo "<input type='text' class='form-control' name='kelas' id='kelas' value='$dataKelas[namaKelas]' disabled required>";
                }
              }
            ?>
          </div>
        </div>

      </div>
    <?php } ?>
  </div>
</div>
<div class="container header">
  <div class="row">
    <div class="col-12">
      <div class="header">
        <div class="col-4">
          <div class="form-group row">
            <label for="idKelas" class="col-sm-5 col-form-label">Mata Kuliah</label>
            <div class="col-sm-7">
              <select class="form-control" name="idKelas" id="idKelas" required>
                <option value="0" rel='0'> -- Pilih Kelas -- </option>
                <?php
                  foreach ($kontrak as $dataKontrak) {
                    if($dataKontrak['idKelas'] == $ampuKelas){
                      foreach ($matkul as $datamatkul) {
                        if($datamatkul['idmatkul'] == $dataKontrak['idmatkul']){
                          echo "<option value='$datamatkul[idmatkul]' rel='$datamatkul[idmatkul]'>$datamatkul[namamatkul]</option>";
                        }
                      }
                    }
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="table-responsive pt-3">
          <table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($materi){
                $i = 1;
                foreach ($materi as $dataMateri) {
                  ?>
                  <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $dataMateri['judulFile'] ?></td>
                    <td><?php echo $dataMateri['deskripsi'] ?></td>
                    <td id="body-table"><a class="btn btn-info btn-sm" href="<?php echo base_url().$dataMateri['lokasiFile'] ?>">Download</a></td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('template/footer_table'); ?>
