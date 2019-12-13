<nav>
      <ul class="nav nav-pills  float-center mt-3">
      <?php if($this->session->userdata('role')=='admin'):?>
      <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item dropdown">
   <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">PENGATURAN<span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
       <li><a href="<?php echo base_url(); ?>index.php/Admin/halamanAkun">Semua Akun</a></li>
       <li><a href="<?php echo base_url(); ?>index.php/Admin/halamandosen">Akun Dosen</a></li>
       <li><a href="<?php echo base_url(); ?>index.php/Admin/halamanmahasiswa">Akun Mahasiswa</a></li>
       <li><a href="<?php echo base_url(); ?>index.php/Admin/halamanKontrak">Hubungan</a></li>
       <li><a href="<?php echo base_url(); ?>index.php/Admin/halamanKelas">Kelas</a></li>
    </ul>
</li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/mahasiswa/halamanMateri'>MATERI</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/stemming'>STEMMING</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/stopword'>STOPWORD REMOVAL</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/tfidf'>PEMBOBOTAN TF-IDF</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/vsm'>PERANGKINGAN VSM</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/evaluasi'>EVALUASI</a>
        </li>
        <li class="nav-item logout">
          <a class="nav-link btn btn-danger" href="<?php echo base_url(); ?>index.php/Login/prosesLogout">KELUAR</a>
        </li>

        <?php elseif($this->session->userdata('role')=='dosen'):?>

          <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>

        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/dosen/halamanMateri'>MATERI</a>
        <li class="nav-item">

        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/stemming'>STEMMING</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/stopword'>STOPWORD REMOVAL</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/tfidf'>PEMBOBOTAN TF-IDF</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/vsm'>PERANGKINGAN VSM</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/evaluasi'>EVALUASI</a>
        </li>
        <li class="nav-item logout">
          <a class="nav-link btn btn-danger" href="<?php echo base_url(); ?>index.php/Login/prosesLogout">KELUAR</a>
        </li>


        </li>

        <?php else:?>
          <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/mahasiswa/halamanMateri'>MATERI</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/stemming'>STEMMING</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/stopword'>STOPWORD REMOVAL</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/tfidf'>PEMBOBOTAN TF-IDF</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/vsm'>PERANGKINGAN VSM</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/fungsi/evaluasi'>EVALUASI</a>
        </li>
        <li class="nav-item logout">
          <a class="nav-link btn btn-danger" href="<?php echo base_url(); ?>index.php/Login/prosesLogout">KELUAR</a>
        </li>

        <?php endif;?>
      </ul>
    </nav>