<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<?php $idUjian = $this->session->userdata('ses_inggris') ?>
<div class="col-sm-12 main">
  <div class="row">
    <div class="col-lg-9">
      <h3>ENGLISH TEST INTRUCTIONS</h3>
      <br>
    </div>
  </div>
  <!--/.row-->
  <div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
    <h4 style="color: #fff;"><b>English Test Instructions</b></h4><br>
    <p style="color: #fff;">1. Read the instructions for each part of questions carefully. </p><br>
    <p style="color: #fff;">2. There will be 2 sections of test, Grammar (1-30) and Grammer(Identifying Sentence Errors) (31-80)</p><br>
    <p style="color: #fff">3. You must complete this test eithin the time limit.</p>
  </div>
</div>
<!--/.main-->
<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
  <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_inggris/' . $idUjian) ?>" class="btn btn-primary mr-2 mb-2">Selanjutnya</a>
</div>
<!-- 
<script type="text/javascript">
  var countDownDate = new Date("<?php echo $end_lat1 ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("time").innerHTML = minutes + " : " + seconds + " ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    // document.getElementById("time").innerHTML = "EXPIRED";
    alert('Waktu latian subtes 1 sudah berakhir, selamat mengerjakan subtes 1');
    window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian/' . $idUjian); ?>';

    // document.getElementById('hentikan').click();
  }
}, 1000);

</script> -->
<?php $this->load->view('layout3/footer') ?>