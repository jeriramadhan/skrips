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
 <h3>Stemming</h3>
                <p>
                Stemming adalah proses mengubah kata berimbuhan menjadi kata dasar. Contohnya:
                </p>
                <ul>
                    <li>Menahan =&gt; tahan</li>
                    <li>Berbalas-balasan =&gt; balas</li>
                </ul>
            </div>
</div></div>
  <form method="post" action="">
      <h2>Simulasi Proses Stemming</h2>
      <div class="text">
      <textarea class="form-control" type="text" name="kata2" id="kata2" rows="10" cols="150" value="<?php if(isset($_POST['kata2'])){ echo $_POST['kata2']; }else{ echo '';}?>"></textarea>
      <button class="btn btn-primary" type="submit" name="submit" value="Submit">Proses Text</button>
      </div>
        </form>
<div class="container">
<div class="row">
<div class="col-md-8">

        <?php

        require_once __DIR__ . '/vendor/autoload.php';

        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();
        if(isset($_POST['kata2'])){
        $sentence = $_POST['kata2'];
        $output = $stemmer->stem($sentence);
        echo $output;
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

