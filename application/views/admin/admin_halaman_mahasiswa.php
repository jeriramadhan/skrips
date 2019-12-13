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
    <h4>Data mahasiswa</h4>
    <style media="screen">
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
  }
</style>
  <!-- </div>
</div> -->
<div class="container">
  <div class="row">
      <div class="col-6 pt-4">
      <?php echo form_open('Admin/prosesTambahmahasiswa'); ?>
        <div class="form-group row">
          <label for="NIM" class="col-sm-3 col-form-label">NIM</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="NIM" id="NIM" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="idKelas" class="col-sm-3 col-form-label">Kelas</label>
          <div class="col-sm-9">
            <select class="form-control" name="idKelas" id="idKelas" required>
              <?php
                foreach ($kelas as $data) {
                  extract($data);
                  echo "<option value='$idKelas'>$namaKelas</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="nama" required>
          </div>
        </div>
      </div>
      <div class="col-6 pt-4">
        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea name="alamat" class="form-control"rows="3" required></textarea>
          </div>
        </div>

      </div>
      <div class="col-12 text-right">
        <?php echo form_submit('submit','Tambah','name="tambah" class="btn btn-success"'); ?>
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
          <th>NIM</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($mahasiswa){
            $i = 1;
            foreach ($mahasiswa as $datamahasiswa) {
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $datamahasiswa['namaKelas'] ?></td>
          <td><?php echo $datamahasiswa['NIM'] ?></td>
          <td><?php echo $datamahasiswa['namamahasiswa'] ?></td>
          <td><?php echo $datamahasiswa['alamatmahasiswa'] ?></td>
          <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahmahasiswa/<?php echo $datamahasiswa['idmahasiswa']; ?>">Ubah</a> <a class="btn btn-danger btn-sm" href="hapusmahasiswa/<?php echo $datamahasiswa['idmahasiswa']; ?>">Hapus</a>
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

<?php $this->load->view('template/footer_table'); ?>
