  <?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<?php $idUjian = $this->session->userdata('ses_tkp') ?>
<div class="col-sm-12 main">
  <div class="row">
    <div class="col-lg-9">
      <h3>Tes Karakteristik Pribadi</h3>
      <br>
    </div>
  </div>
  <!--/.row-->
  <div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
    <h3 style="color: #fff;">INTRUKSI :</h3>
    <br>
    <p style="color: #fff;">1. Pada Tes Karakteristik Pribadi ini terdapat 50 soal.</p>
    <p style="color: #fff;">2. Dalam tes ini tidak ada jawaban benar ataupun salah.</p>
    <p style="color: #fff;">3. Pilihlah jawaban yang paling menggambarkan karakter pada diri anda.<br>
    <p style="color: #fff;">4. Waktu pengerjaan soal 60 Menit.<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <h4 style="color: #fff; text-align:center;">SELAMAT MENGERJAKAN !</h4>
    
  </div>
</div>
<!--/.main-->
<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
  <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_tkp/' . $idUjian) ?>" class="btn btn-primary mr-2 mb-2">Mulai Kerjakan</a>
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
    window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian_tkp/' . $idUjian); ?>';

    // document.getElementById('hentikan').click();
  }
}, 1000);

</script> -->
<?php $this->load->view('layout3/footer') ?>