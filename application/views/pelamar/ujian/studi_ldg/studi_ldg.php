<?php   $this->load->view('layout3/header2') ?>
<?php   $this->load->view('layout3/navbar') ?>

<?php 
$id_pelamar = $this->session->userdata('ses_id');
$idStudi = $this->session->userdata('ses_ujianStudi_ldg');
$idLowongan = $this->session->userdata('sesIdLowongan');

$studi = $this->db->query("SELECT * FROM tb_ujian_kasus_ldg WHERE id_ujian_studi_ldg = $idStudi");
foreach ($studi->result() as $key_uStudi) {
	$timeStudi = $key_uStudi->waktu_akhir;
}
?>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3 class="page-header" style="margin-top: 15px">STUDI KASUS ITS </h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu pengerjaan <span id="time"></span> detik</h4>
		</div>
	</div><!--/.row-->


	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<h4 style="color: #fff;"><b>Petunjuk Pengisian</b></h4>
		<p style="color: #fff">Jawablah	beberapa pertanyaan	dibawah	ini	sesuai dengan pemahaman yang anda milik saat ini secara	singkat	dan	jelas !</p>
	</div>

	<div class="container">
		
	
	<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
		<div class="form-row">
			<form action="<?php echo base_url("Pelamar/Ujian/jawaban_studi_ldg/") ?>" method="post">
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
						PT. Mata Air Dewa adalah sebuah perusahaan yang bergerak di bidang  pengelolaan air minum selama kurang lebih 20  tahun di Kabupaten salah satu destinasi wisata terkenal di Indonesia. Adapun jumlah pegawainya adalah sekitar 45  pegawai baik yang bertugas di kantor maupun operasional yang terdiri dari administrasi dan keuangan, hubungan pelanggan dan Teknik yang sudah bekerja cukup lama pada perusahaan tersebut. Seiring dengan perkembangan jaman dan persiapan tantangan kedepan, perusahaan ini melakukan ekspansi dan pengembangan bisnis dengan mengajak kerjasama mitra  perusahaan swasta PT. Segar Alami untuk mengembangkan perusahaan PT. Mata Air Dewa baik dari sisi pengelolaan manajemen, keuangan bahkan pemasaran. 
						</p>
						<p>
						PT. Segar Alami sendiri saat ini memiliki 22 pegawai yang rata-rata memiliki usia yang masih cukup muda, antusias dan inklusif dalam mengerjakan tugas-tugas pekerjaan selama ini. Adapun anggota pegawai PT. Segar Alami ini sudah bersama-sama membaur dengan PT. Mata Air Dewa dengan karakteristik pegawai yang sudah dikatakan senior sudah berjalan selama 1 bulan lamanya.  Adapun tujuan kerjasama antara 2 perusahaan ini adalah  nantinya mampu bersama-sama mengembangkan perusahaan PT. Mata Air Dewa menjadi lebih maju baik dari sisi administrasi, keuangan, maupun operasional untuk kemajuan perusahaan. 
						</p>
						<p>
						Berdasarkan hasil penilaian 1 bulan awal ini didapati bahwa kondisi PT, Mata Air Dewa ini masih terkendala permasalahan terkait dengan pengelolaan dokumen administrasi yang belum terarsip dengan baik, pelaporan keuangan yang masih belum sistematis bahkan pengembangan SDM dan kepemimpinan yang masih belum dilakukan secara optimal. Disinilah menjadi tantangan dari anggota SDM PT. Segar Alami baik dari segi teknis pekerjaan maupun budaya perusahaan yang berbeda dengan perusahaan sebelumnya. 
						</p>
						<p>
					</br>
					 <br>
					<label>
					<u>TUGAS</u>
</br>
					<u>Posisikan diri anda sebagai pegawai PT. Segar Alami kemudian, anda diminta untuk:</u>
					</label>
					</br>

					<br>
						<p>
						1.	Susunlah prioritas atas permasalahan yang ada pada PT.  Mata Air Dewa diatas (Sekiranya mana yang harus diselesaikan terlebih dahulu). Kemudian berikan alasan logisnya mengapa demikian?
						</p>
					</br>

					<textarea class="form-control" name="jawaban" required=required></textarea>
					<br>
						<p>
						2.	Berdasarkan  permasalahan yang dihadapi oleh PT. Mata Air Dewa silahkan anda susun langkah konkrit apa saja yang perlu dilakukan untuk menyelesaikannya sesuai dengan pengalaman anda  di posisi jabatan saat ini?
						</p>
					</br>
					<textarea class="form-control" name="jawaban1" required=required></textarea>
					<br>
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
    alert('Waktu mengerjakan ujian studi kasus sudah habis');
    window.location.href = '<?php echo base_url('Pelamar/Pelamar/testulispsikotes'); ?>';
  }
}, 1000);

</script>

<?php   $this->load->view('layout3/footer') ?>