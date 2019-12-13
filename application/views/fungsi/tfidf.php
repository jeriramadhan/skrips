<?php $this->load->view('template/header_table'); ?>


<div class="container" id="container">
<div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/title2.png ">
    </div>
  <div class="header clearfix">
  <?php $this->load->view('template/menu');?> 
     
  </div>
    <!--Include menu-->
      <div class="container">
        <div class="row">
          <!-- <h3>Simulasi Pembobotan TF-IDF</h3> -->
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
  </head>
  <body>
    <form class="" action="<?php echo base_url().'index.php/fungsi/action_tfidf'?>" method="post">
      <h2>TF-IDF</h2>
      <div class="text">
            <textarea class="form-control" name="text" rows="10" cols="150"></textarea>
            <button class="btn btn-primary" type="submit" name="button">Proses Text</button>
      </div>


    </form>




  </body>

<?php

?>
        </div>
      </div>
    </div> <!-- /container -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

  </body>
</html>
