<?php   $this->load->view('layout3/header2') ?>
<?php   $this->load->view('layout3/navbar') ?>

<?php 
$id_pelamar = $this->session->userdata('ses_id');
$idStudi = $this->session->userdata('ses_ujianStudi_manajerial');
$idLowongan = $this->session->userdata('sesIdLowongan');

$studi = $this->db->query("SELECT * FROM tb_ujian_kasus_manajerial WHERE id_ujian_studi_manajerial = $idStudi");
foreach ($studi->result() as $key_uStudi) {
	$timeStudi = $key_uStudi->waktu_akhir;
}
?>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3 class="page-header" style="margin-top: 15px">STUDI KASUS MANAJERIAL & UMUM</h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu pengerjaan <span id="time"></span> detik</h4>
		</div>
	</div><!--/.row-->


	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<h4 style="color: #fff;"><b>Petunjuk Pengisian</b></h4>
		<p style="color: #fff">Jawablah	beberapa	pertanyaan	dibawah	ini	sesuai dengan pemahaman yang anda miliki	saat ini secara	singkat	dan	jelas !</p>
	</div>

	<div class="container">
		
	
	<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
		<div class="form-row">
			<form action="<?php echo base_url("Pelamar/Ujian/jawaban_studi_manajerial/") ?>" method="post">
				<input type="hidden" name="id_ujian" value="<?php echo $idStudi ?>">
				<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $idLowongan ?>">
				<div class="form-group">

				<br><label>STUDI KASUS</label></br>
				<br>
					<label>
					<u>PERSOALAN</u>
					</label>
				</br>
					<br>
						<p>
						PT. ABC adalah sebuah perusahaan induk yang saat ini membawahi beberapa
						anak perusahaan dengan bidang yang bervariasi dan sudah berdiri selama lebih
						dari 20 tahun. Adapun jumlah pegawai yang dimiliki sudah dikatakan cukup
						banyak untuk membantu perusahaan dalam mencapai target yang ditetapkan.
						Meskipun demikian, lebih dari 50% pegawai masih belum bekerja dengan
						optimal dalam menjalankan tugas-tugasnya dikarenakan beberapa hal, antara
						lain:
						</p>
					</br>
					<label>
					A. Dari Segi Non-Keuangan
					</label>
					<br>
						<p>
						<br>1. Belum adanya deskripsi tugas yang jelas pada setiap pegawai atas tugastugas
						yang seharusnya menjadi tanggung jawab pekerjaannya. Hal ini
						membuat terjadinya tumpang-tindih penyelesaian tugas dan menjadi
						kurang efektif.</br>
						<br>2. Belum tersusunnya alur SOP yang terstandar atas setiap proses kerja
						yang seharusnya diselesaikan sehingga membuat pegawai banyak
						melakukan kesalahan kerja dan target waktu yang cenderung molor.</br>
						<br>3. Banyaknya jumlah SDM/Pegawai masih belum diimbangi dengan
						kompetensi yang seharusnya dimiliki untuk menyelesaikan sebuah tugas
						yang diberikan.</br>
						<br>4. Koordinasi antar perusahaan induk maupun sesama anak usaha masih
						belum diterapkan dengan efektif sehingga sering terjadi miskomunikasi
						dalam penyelesaian target/progress kerja yang sudah ditetapkan.</br>
						</p>
					</br>

					<label>
					B. Dari Keuangan
					</label>
					<br>
						<p>
						<br>1. Keterlambatan pencairan dana operasional atas pengajuan rutin untuk
						kebutuhan (pembelian peralatan/bahan kerja) yang sudah diajukan oleh
						masing-masing divisi sehingga membuat proses kerja menjadi terhambat
						baik dari segi internal maupun hubungannya dengan vendor/klien
						(komplain).</br>
						<br>2. Keluhan kesejahteraan dari pegawai yang masih perlu ditingkatkan,
						khususnya dari masa kerja dan loyalitas pegawai pada perusahaan.</br>
						</p>
					</br>

					<br>
					<label>
					<u>TUGAS</u>
					</label>
					</br>

					<br>
						<p>
						Posisikan diri anda sebagai pegawai PT. ABC kemudian, anda diminta untuk
						mengidentifikasi akar permasalahan yang terjadi di perusahaan tersebut
						sekaligus menyusun strategi dan langkah konkrit yang dilakukan untuk
						menyelesaikan permasalahan tersebut. (Dapat Disusun dalam bentuk
						bagan/alur/tabel yang sistematis).
						</p>
					</br>

					<textarea class="form-control" name="jawaban1" required=required></textarea>
				
			</div>

		</div>

		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
			<input style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2" value="Kirim Jawaban"></a>
			<!-- <button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/jawaban_endStudi') ?>" class="btn btn-primary"> Kirim Jawaban Bro <i class="fa fa-arrow-circle-right"></i>
						</button> -->
		</div>
	</form>


<script type="text/javascript">
  var countDownDate = new Date("<?php echo $timeStudi ?>").getTime();

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
    alert('Waktu mengerjakan ujian essay sudah habis');
    window.location.href = '<?php echo base_url('Pelamar/Pelamar/testulispsikotes'); ?>';
  }
}, 1000);

</script>

<?php   $this->load->view('layout3/footer') ?>