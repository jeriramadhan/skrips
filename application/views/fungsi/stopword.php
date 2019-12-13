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
          <!-- <h3>Simulasi Stemming</h3> -->
          <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
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

  <div class="container">
<div class="row">
<div class="col-md-8">
 <h3>Stopword Removal</h3>
                <p>
                Stopword merupakan kata yang diabaikan dalam pemrosesan, kata-kata ini biasanya disimpan ke dalam stop lists. Karakteristik utama dalam pemilihan stop word biasanya adalah kata yang mempunyai frekuensi kemunculan yang tinggi. Contoh
                </p>
                <ul>
                    <li>Akan =&gt; dihilangkan</li>
                    <li>Tapi =&gt; dihilangkan</li>
                </ul>
            </div>
</div></div>
    <form class="" action="" method="post">
      <h2>Stopword Removal</h2>
      <div class="text">
            <textarea class="form-control" name="kalimat" rows="10" cols="150"></textarea>
            <button class="btn btn-primary" type="submit" name="button" value="Proses">Proses Text</button>
      </div>
    </form>
  <div class="container">
<div class="row">
<div class="col-md-8">
  <?php

include_once __DIR__ . '/proses_stopword.php';
if(isset($_POST['kalimat'])){
        $contents = $_POST['kalimat'];
        print_r(removeCommonWords($contents));
        }
        ?>
        </div>
        </div></div>


        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('template/footer_table'); ?>