<?php   $this->load->view('layout3/header2') ?>
<?php   $this->load->view('layout3/navbar') ?>

<?php 
$id_pelamar = $this->session->userdata('ses_id');
$idStudibank = $this->session->userdata('ses_ujianStudibank');
$idLowongan = $this->session->userdata('sesIdLowongan');

$studibank = $this->db->query("SELECT * FROM tb_ujian_studibank WHERE id_ujian_studibank = $idStudibank");
foreach ($studibank->result() as $key_ustudibank) {
	$timestudibank = $key_ustudibank->waktu_akhir;
}
?>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3 class="page-header" style="margin-top: 15px">Studi Kasus</h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu pengerjaan <span id="time"></span> detik</h4>
		</div>
	</div><!--/.row-->


	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<center>
		<h2 style="color: #fff;"><b>STUDI KASUS</b></h2>
		</center>
		<h3 style="color: #fff" align="center">Ketidakpuasan Layanan Customer Service Bank ABC</h3>
	</div>

	<div class="container">
		
	
	<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
		<div class="form-row">
			<form action="<?php echo base_url("Pelamar/Ujian/jawaban_studibank/") ?>" method="post">
				<input type="hidden" name="id_ujian" value="<?php echo $idStudibank ?>">
				<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $idLowongan ?>">
				<div class="form-group">

				<br>
				<label>Keluhan :</label>
				<p>
					Nama saya Mohammad Farid Sugeha, customer Bank ABC dengan nomor  kartu  4097  xxxx  xxxx  x993 merasa tidak puas atas lambannya pelayanan dari Customer Service Bank ABC dalam menangani satu kasus dijanjikan awalnya 14 hari kerja malah mundur satu bulan.
				</p>
				<p>
					Saya sudah  beberapa  kali  complaint  mengenai  masalah dana yang  tidak  keluar  pada  saat  saya melakukan transaksi pada ATM link Cabang sudirman (Gedung PACIFIC II) pada tanggal 23 Januari 2020 jam 18:05 sebesar Rp500,000. Dana tidak keluar dan bukti transaksi tidak keluar. Tetapi, saldo tabungan saya  berkurang  yang  awalnya Rp2,300,000 menjadi  Rp1,700,000.
				</p>
				<p>
					Keesokan harinya saya telepon ke Customer Service Bank ABC di nomor telepon 14000 diterima oleh seorang  perempuan  yang  menginfokan  memang  benar  ada  transaksi  penarikan  pada  hari  itu.  Lalu, beliau menyarankan  saya membuat  complaint  pada Bank ABC terdekat dan pada tanggal 27 Januari 2020 saya membuat  laporan pada Bank ABC Cabang Bendungan  Hilir. Saya menyerahkan  fotokopi buku tabungan, KTP, dan kartu ATM sebagai kelengkapan  untuk proses tersebut dan saya dijanjikan 14 hari kerja.
				</p>
				<p>
					Setelah 14 hari kerja saya telepon kembali ke Customer Service Bank ABC saya disarankan untuk menunggu kembali karena masih dalam proses dan pada tanggal 03 Maret 2020 saya telepon kembali. Saya masih disuruh menunggu entah sampai kapan saya masih harus menunggu karena masih dalam proses.
				</p>
				<p>
					Saya sangat kecewa sekali karena saya sudah merasa disepelekan oleh Bank ABC. Padahal Bank ABC salah satu bank terbesar di Indonesia tapi seperti ini cara melayani nasabah. Bank ABC tidak dapat memastikan berapa hari suatu kasus dapat  diselesaikan.
				</p>
				<p>
					Memang dana saya tidak terlalu besar. Tapi, harusnya Bank ABC dapat memastikannya bukan menggantung  nasabah seperti ini. Saya berharap setelah saya menulis complaint ini ada niat baik dari Bank ABC dan dana saya dapat kembali ke rekening saya?
				</p>
				</br>
					<label>PERTANYAAN :</label>
				<br>	
					<label>1. Menurut anda, apakah penyebab dari permasalahan tersebut ?</label>
				</br>
					<textarea class="form-control" name="jawaban1" required=required></textarea>
				<br>
				<label>2. Bagaimana upaya yang perlu diterapkan untuk menyelesaikan  masalah tersebut dilihat dari pemahaman anda mengenai pelayanan prima perbankan ?</label>
				</br>
					<textarea class="form-control" name="jawaban2" required=required></textarea>
				<br>
					
				</div>
				
			</div>

		</div>

		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
			<input style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2" value="Kirim Jawaban"></a>
			<!-- <button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/jawaban_endstudibank') ?>" class="btn btn-primary"> Kirim Jawaban Bro <i class="fa fa-arrow-circle-right"></i>
						</button> -->
		</div>
	</form>


<script type="text/javascript">
  var countDownDate = new Date("<?php echo $timestudibank ?>").getTime();

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
    alert('Waktu mengerjakan ujian studibank sudah habis');
    window.location.href = '<?php echo base_url('Pelamar/Pelamar/testulispsikotes'); ?>';
  }
}, 1000);

</script>

<?php   $this->load->view('layout3/footer') ?>