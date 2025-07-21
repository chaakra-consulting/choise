<?php   $this->load->view('layout3/header2') ?>
<?php   $this->load->view('layout3/navbar') ?>

<?php 
$id_pelamar = $this->session->userdata('ses_id');
$idStudi = $this->session->userdata('ses_ujianStudi');

$essay = $this->db->query("SELECT * FROM tb_ujian_kasus WHERE id_ujian_studi = $idStudi");
foreach ($essay->result() as $key_uHolland) {
	$timeHolland = $key_uHolland->waktu_akhir;
}
?>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3 class="page-header" style="margin-top: 15px">ESSAY KOMPETENSI</h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu pengerjaan <span id="time"></span> detik</h4>
		</div>
	</div><!--/.row-->


	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<h4 style="color: #fff;"><b>Petunjuk Pengisian</b></h4>
		<p style="color: #fff">Jawablah	beberapa pertanyaan	dibawah	ini	sesuai	dengan	pemahaman	dan	kompetensi	yang	anda	miliki	saat	ini	secara	singkat	dan	jelas.</p>
	</div>

	<div class="container">
		

		<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
			<h3 align="center"><b>Teller Bank XYZ </b></h3>
			<p align="justify">Keluhan <br>
				Di sebuah pagi pada Tanggal 15 April 2024, Bank XYZ yang merupakan salahsatu bank swasta nasional ini  sudah ramai didatangi oleh nasabah setianya dalam melakukan berbagai transaksi perbankan.<br><br>
				Adapun salahsatu nasabahnya adalah Putri Salsabila  merupakan seorang mahasiswi sebuah universitas di Surabaya sekaligus sebagai nasabah Bank XYZ  yang hendak menyetorkan uang sejumlah Rp.1.000.000 (pecahan Rp.100.000)  dengan nomor kartu 2051 xxxx xxxx x081 untuk keperluan membayar uang perkuliahan.<br><br>
				Pada saat nasabah melakukan penyetoran, teller Bank XYZ dengan ramah menyapa dan melakukan beberapa konfirmasi atas transaksi yang akan dilakukan oleh sdri. Putri Salsabila. Adapun pada saat proses transaksi berlangsung, ternyata teller menemukan adanya 1 lembar uang palsu (pecahan Rp. 100.000) yang diterima dari nasabah pada saat melakukan pengecekan dan penghitungan mata uang yang akan disetorkan.<br> <br>
				Adapun hal ini ketika disampaikan pada nasabah yang bersangkutan merasa dirugikan dan komplain bahwa  kondisi uang yang disetorkan tidak sesuai dengan informasi yang disampaikan oleh teller.<br><br>
				Dimana pada saat bersamaan juga terjadi antrian nasabah  yang cukup panjang membuat nasabah lain sudah menunggu lama (lebih dari 15 menit) disamping jumlah teller bank XYZ di hari itu jumlahnya terbatas tidak sebanyak biasanya.<br><br>
				Berdasarkan hal diatas, maka anda akan diminta untuk memposisikan diri sebagai teller bank XYZ untuk mengatasi hal yang terjadi dengan menjawab beberapa pertanyaan dibawah ini.</p><br>
			<label><b>PERTANYAAN :</b></label>
			<div class="form-row">
				<form action="<?php echo base_url("Pelamar/Ujian/jawaban_studi/") ?>" method="post">
					<input type="hidden" name="id_ujian" value="<?php echo $idStudi ?>">
					<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
					<div class="form-group">
						<label>1. Apabila anda memposisikan diri sebagai teller bank XYZ, maka jelaskan Langkah-langkah yang akan anda lakukan untuk menyelesaikan permasalahan yang dihadapi oleh nasabah Putri Salsabila? </label>
						<textarea class="form-control" name="jawaban1" required=required></textarea>
					</div>
					<div class="form-group">
						<label>2. Sebagai teller professional, bagaimana cara anda untuk merespon komplain yang disampaikan  nasabah lain sesuai dengan ilustrasi diatas?
						</label>
						<textarea class="form-control" name="jawaban2" required=required></textarea>
					</div>

				</div>

			</div>

			<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
				<input style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2" value="Selanjutnya"></a>
			</div>
		</form>


		<script type="text/javascript">
			var countDownDate = new Date("<?php echo $timeHolland ?>").getTime();

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