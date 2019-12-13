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
          <h3>Hasil Pembobotan TF IDF</h3>
        </div>
      </div>
    <!-- </div> /container -->
  <table style="margin-top:30px;" class="table table-bordered">
<thead>
 <tr>
   <th>Q</th>
   <?php
   $table1=$_SESSION['table1'];
    $f=1;
    foreach ($table1[0]['dok'] as $key) {
        echo "<th>D".$f."</th>";
        ++$f;
    } ?>
   <th>df</th>
   <th>D/df</th>
   <th>IDF</th>
   <th>IDF+1</th>
 </tr>
</thead>
<tbody>
<?php
$p=0;
    foreach ($table1 as $key) {
        echo "<tr>
    <td>".$key['term']."</td>";
        foreach ($key['dok'] as $key1) {
            echo "<td>".$key1."</td>";
        }

        echo "<td>".$key['df']."</td>
<td>".$key['Ddf']."</td>
<td>".$key['idf']."</td>
<td>".$key['idf1']."</td>
</tr>";


        ++$p;
    }


    //echo json_encode($_SESSION['table2']);?>


</tbody>
</table>

<table class="table table-bordered">
   <thead>
     <tr>
       <?php
       $table2=$_SESSION['table2'];
    $f=1;
    foreach ($table2 as $key) {
        echo "<th>Kalimat ".$f."</th>";
        ++$f;
    } ?>
     </tr>
   </thead>
   <tbody>


     <?php
     $counter=count($table2[0]['a']);
    for ($h=0;$h<$counter;++$h) {
        echo "<tr>";
        for ($e=0;$e<count($table2);++$e) {
            echo "<td>".$table2[$e]['a'][$h]."</td>";
        }
        echo "</tr>";
        //  print_r($table2[$q][1]);
    } ?>

   </tbody>
 </table>


 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Kalimat</th>
        <th>Score Pembobotan</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $urutan2=$_SESSION['urutan2'];
      $data = array();
      $data2 = array(); 
foreach ($urutan2 as $key => $value) {
  $data[] = $value;
  $data2[] = $key+1;
 echo "<tr>
   <td>Kalimat ".($key+1)."</td>
   <td>".$value."</td>
 </tr>";
}

// echo json_encode($data);
// echo json_encode($data2);
      ?>
    </tbody>
  </table>

<h4>Teks Awal</h4>
<textarea class="form-control" rows="10" cols="150"><?php $original_data=$_SESSION['original_data']; echo $original_data; ?></textarea>
<br>
<h4>Teks Akhir Hasil Pembobotan TF-IDF</h4>
<?php
  $data_asli=explode(".",$_SESSION['original_data']);
  $s=0;
  foreach ($urutan2 as $key => $value) {
    echo $data_asli[$key].".";
  if($s==2){
    break;
  }
  ++$s;
  }
  ?>
</div>

<br><br>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
 <script type="text/javascript">
  function play (){
   responsiveVoice.speak(
    "<?php
  $data_asli=explode(".",$_SESSION['original_data']);
  $s=0;
  foreach ($urutan2 as $key => $value) {
    // echo str_replace('“','',$data_asli[$key].".");
    $search  = array('"','“',"\r\n","'");
    $replace = array('','',"","");
  echo str_replace($search, $replace, $data_asli[$key].".");
  if($s==1){
    break;
  }
  ++$s;
  }
  ?>",
    "Indonesian Female",
    // responsiveVoice.speak(
    // "Hey nama saya cahya, kang cahya dot kom merupakan web personal saya, terimakasih telah berkunjung kemari.",
    // "Indonesian Female",
    {
     pitch: 1, 
     rate: 1, 
     volume: 1
    }
   );
  }

  //   $search  = array('"', '“', ' ');
  //   $replace = array('');
  // echo str_replace($search, $replace, $subject);

  function stop (){
   responsiveVoice.cancel();
  }

  function pause (){
   responsiveVoice.pause();
  }

  function resume (){
   responsiveVoice.resume();
  }
 </script>

</div>
<center>
<button onclick="play();">Play</button>
 <button onclick="stop();">Stop</button>
 <button onclick="pause();">Pause</button>
 <button onclick="resume();">Resume</button>
 </center>
 <br><br><br><br>

<div class="col-md-6">
 <canvas id="myChart" width="400" height="200"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($data2); ?>,
        datasets: [{
            label: '# Hasil Pembobotan',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
            ],
            borderWidth: 1
        }]
    }
});
</script>
<br><br><br><br>
</div>

<br><br><br><br>
  </body>

</html>
<script src="<?php echo base_url().'assets/js/Chart.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>



