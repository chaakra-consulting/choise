<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<?php $idUjian = $this->session->userdata('ses_epps') ?>
<div class="col-sm-12 main">

  <div class="row">
    <div class="col-lg-9">
      <h3>PETUNJUK <b>TES MINAT (BENTUK PANJANG)</b></h3>
      <br>
    </div>
  </div>
  <!--/.row-->


  <div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
    <h4 style="color: #fff;">Petunjuk Pengerjaan <b>TES MINAT (BENTUK PANJANG)</b></h4><br>
    <!-- <p style="color: #fff;">Dalam ujian ini terdapat 225 pasang pernyataan. Anda harus memilih salah satu dari setiap pasang pernyataan, yang menurut anda paling mencerminkan diri anda atau paling menunjukkan bagaimana perasaan anda. Kadang-kadang anda akan mendapatkan sepasang pernyataan yang keduanya tidak menggambarkan diri anda, dalam hal seperti ini anda <strong>tetap harus memilih salah satu yang lebih mendekati</strong></p><br>
    <p style="color: #fff;">Sebagai contoh, bila anda merasa pernyataan <strong>"Saya lambat dalam membuat teman"</strong> lebih mencerminkan diri anda dari pada pernyataan <strong>"Saya lambat dalam mengambil keputusan"</strong></p><br>
    <p style="color: #fff">Harap berhati-hati dalam menjawab, guna memastikan bahwa anda menjawab pada kolom yang sesuai, Bekerjalah secepat mungkin, tetapi periksa dengan cermat bahwa anda sudah memilih satu pernyataan dari setiap pasang pernyataan-pernyataan dalam ujian ini</p> -->
    <p style="color: #fff;"> &nbsp;&nbsp;&nbsp;&nbsp;- Pada Pengerjaan kali ini, anda akan dihadapkan pada 225 persoalan.</p>
    <p style="color: #fff;"> &nbsp;&nbsp;&nbsp;&nbsp;- Setiap 1 soal terdiri dari 2 pernyataan (A & B).</p>
    <p style="color: #fff;"> &nbsp;&nbsp;&nbsp;&nbsp;- Anda diminta untuk memilih 1 (Satu) dari setiap pasang pernyataan (A/B) yang <strong>PALING SESUAI</strong> dengan diri anda.</p>
    <p style="color: #fff;"> &nbsp;&nbsp;&nbsp;&nbsp;- Apabila pernyataan A & B sama-sama sesuai/ sebaliknya, maka anda tetap diminta untuk memilih 1 jawaban saja.</p>
    <p style="color: #fff;"> &nbsp;&nbsp;&nbsp;&nbsp;- Tidak ada jawaban yang benar dan salah.</p>
    <p style="color: #fff;"> &nbsp;&nbsp;&nbsp;&nbsp;- Pastikan setiap soal terisi dengan <strong>SATU</strong> jawaban saja (jangan ada yang terlewati).</p><br>
    <p style="color: #fff;"><b>CONTOH</b></p>
    <p style="color: #fff;">A. Saya lambat dalam membuat teman.</p>
    <p style="color: #fff;">B. Saya lambat dalam mengambil keputusan.</p>
    <p style="color: #fff;">Bila anda merasa pernyataan poin <strong>"A"</strong> lebih mencerminkan diri anda dari pada pernyataan poin <strong>"B"</strong>, Maka silahkan pilih poin A.</p>

  </div>

</div>
<!--/.main-->

<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
  <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_epps/' . $idUjian) ?>" class="btn btn-primary mr-2 mb-2">Selanjutnya</a>
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