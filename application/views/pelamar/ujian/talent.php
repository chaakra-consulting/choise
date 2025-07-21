<?php   $this->load->view('layout3/header2') ?>
<?php   $this->load->view('layout3/navbar') ?>

<?php 
$id_pelamar = $this->session->userdata('ses_id');
$idTalent = $this->session->userdata('ses_ujianTalent');
$idLowongan = $this->session->userdata('sesIdLowongan');

$talent = $this->db->query("SELECT * FROM tb_ujian_talent WHERE id_ujian_talent = $idTalent");
foreach ($talent->result() as $key_uTalent) {
	$timeTalent = $key_uTalent->waktu_akhir;
}
?>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3 class="page-header" style="margin-top: 15px">TALENT TEST</h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu pengerjaan <span id="time"></span> detik</h4>
		</div>
	</div><!--/.row-->


	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<center>
		<h2 style="color: #fff;"><b>Who Am i ?</b></h2>
		</center>
		<p style="color: #fff">Berikanlah 10 pernyataan tentang pribadi Anda yang menjelaskan tentang kebiasaankebiasaan
		Anda, meliputi 5 kelebihan dan 5 kelemahan Anda (namun tidak terkait dengan hal - hal
		yang bersifat fisik)</p>
		<label style="color: #fff">Contoh :</label>
		<br>
		<li style="color: #fff; margin-left: 50px">
			Saya memiliki tubuh yang tinggi untuk ukuran pria Indonesia pada umumnya
				<img src="<?php  echo base_url('upload/bank_soal/talent/wrong.png') ?>" alt="" style="width: 30px; border-radius: 5px; margin-left: 20px">
		</li>
		<br>
		<li style="color: #fff; margin-left: 50px">
			Saya ingin menyelesaikan sesuatu sesempurna mungkin
				<img src="<?php  echo base_url('upload/bank_soal/talent/correct.png') ?>" alt="" style="width: 30px; border-radius: 5px; margin-left: 170px">
		</li>
	</div>

	<div class="container">
		
	
	<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
		<div class="form-row">
			<form action="<?php echo base_url("Pelamar/Ujian/jawaban_talent/") ?>" method="post">
				<input type="hidden" name="id_ujian" value="<?php echo $idTalent ?>">
				<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $idLowongan ?>">
				<div class="form-group">

				<br>
				<label>1. ( 5 ) Kelebihan saya adalah :</label>
				</br>
					<textarea class="form-control" name="jawaban1" required=required></textarea>
				<br>	
					<label>2. ( 5 ) Kekurangan saya adalah :</label>
				</br>
					<textarea class="form-control" name="jawaban2" required=required></textarea>
				<br>
				<label>3. Dalam 5 (lima) tahun mendatang, saya menggambarkan diri saya (boleh lebih dari satu) :</label>
				</br>
					<textarea class="form-control" name="jawaban3" required=required></textarea>
				<br>
					
				</div>
				
			</div>

		</div>

		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
			<input style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2" value="Kirim Jawaban"></a>
			<!-- <button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/jawaban_endTalent') ?>" class="btn btn-primary"> Kirim Jawaban Bro <i class="fa fa-arrow-circle-right"></i>
						</button> -->
		</div>
	</form>


<script type="text/javascript">
  var countDownDate = new Date("<?php echo $timeTalent ?>").getTime();

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
    alert('Waktu mengerjakan ujian talent sudah habis');
    window.location.href = '<?php echo base_url('Pelamar/Pelamar/testulispsikotes'); ?>';
  }
}, 1000);

</script>

<?php   $this->load->view('layout3/footer') ?>