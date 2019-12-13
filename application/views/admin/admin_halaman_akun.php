<?php $this->load->view('template/header_admin'); ?>


<div class="container" id="container">
<div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/title2.png ">
    </div>
  <div class="header clearfix">
  <?php $this->load->view('template/menu');?> 
    
  </div>
<div class="container" id="menu-top">
  <div class="row">
    <div class="col-md-6">
      <h4>Data Akun dosen</h4>
      <div class="table-responsive pt-3">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if($dosen){
              foreach ($dosen as $datadosen) {
            ?>
            <tr>
              <td><?php echo $datadosen['NIP'] ?></td>
              <td><?php echo $datadosen['namadosen'] ?></td>
              <td><?php echo $datadosen['password'] ?></td>
              <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahPassworddosen/<?php echo $datadosen['iddosen']; ?>">Ubah</a>
            </tr>
            <?php
              }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <h4>Data Akun mahasiswa</h4>
      <div class="table-responsive pt-3">
        <table id="table" class="table table-striped">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if($mahasiswa){
              foreach ($mahasiswa as $datamahasiswa) {
            ?>
            <tr>
              <td><?php echo $datamahasiswa['NIM'] ?></td>
              <td><?php echo $datamahasiswa['namamahasiswa'] ?></td>
              <td type="password"><?php echo $datamahasiswa['password'] ?></td>
              <td id="body-table"><a class="btn btn-info btn-sm" href="halamanUbahPasswordmahasiswa/<?php echo $datamahasiswa['idmahasiswa']; ?>">Ubah</a>
            </tr>
            <?php
              }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<?php $this->load->view('template/footer'); ?>
