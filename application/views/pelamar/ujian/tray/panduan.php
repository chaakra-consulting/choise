<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<?php $idUjian = $this->session->userdata('ses_tray') ?>
<div class="col-sm-12 main">
  <div class="row">
    <div class="col-lg-7">
      <h4><b>ILUSTRASI TES IN-TRAY</b></h4>
    
    </div>
		<div class="col-lg-5">
			<h4 style="margin-top: 35px" align="right">Waktu panduan <span id="time"></span> detik</h4>
		</div>
	</div>
  <?php $idUjian = $this->session->userdata('ses_tray');

$ujian = $this->db->query("SELECT * FROM tb_ujian_tray WHERE id_ujian_tray = $idUjian");

	foreach ($ujian->result() as $key ) {

		$endlat = $key->end_lat;

	} 

$id_pelamar = $this->session->userdata('ses_id');?>
  <!--/.row-->
  <div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
    <h4 style="color: #fff;"><b>ILUSTRASI :</b></h4><br>
    <p style="color: #fff;">Anda adalah Irfani Fridana, seorang manajer pada suatu perusahaan consumer goods, bernama PT ABC. Bidang yang Anda tangani adalah mengenai Human Resource. Anda telah menduduki posisi ini selama enam bulan, setelah sebelumnya selama 7 tahun berkarir dibidang training and development.</p>
    <p style="color: #fff;">Pada tanggal 1 September Anda ditugaskan untuk melakukan studi banding di Singapore mengenai peran manajemen pengembangan SDM dalam tranformasi organisasi selama dua minggu.</p>
    <p style="color: #fff;">Ketika Anda pulang ke tanah air dan kembali ke kantor, ternyata sudah banyak tugas yang harus segera Anda selesaikan. Seperti terlihat dari sejumlah e-mail yang muncul di Inbox. Terlampir adalah email emailnya</p>
</div>
<!--/.main-->
<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
Tunggu Hingga Waktu Berakhir
</div>
<script type="text/javascript">

  var countDownDate = new Date("<?php echo $endlat ?>").getTime();



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

    alert('Waktu Ilustrasi sudah berakhir, selamat mengerjakan');

    window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian_tray/'.$idUjian); ?>';



    // document.getElementById('hentikan').click();

  }

}, 1000);



</script>



<?php   $this->load->view('layout3/footer') ?>