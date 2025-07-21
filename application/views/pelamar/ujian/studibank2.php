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


	<div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<center>
		<h2 style="color: #fff;"><b>STUDI KASUS :</b></h2>
		</center>
		<h3 style="color: #fff" align="center">Teller Bank XYZ</h3>
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
				Di sebuah pagi pada Tanggal 15 April 2024, Bank XYZ yang merupakan salahsatu bank swasta nasional ini  sudah ramai didatangi oleh nasabah setianya dalam melakukan berbagai transaksi perbankan. Adapun salahsatu nasabahnya adalah Putri Salsabila  merupakan seorang mahasiswi sebuah universitas di Surabaya sekaligus sebagai nasabah Bank XYZ  yang hendak menyetorkan uang sejumlah Rp.1.000.000 (pecahan Rp.100.000)  dengan nomor kartu 2051 xxxx xxxx x081 untuk keperluan membayar uang perkuliahan.
				</p>
				<p>
				Pada saat nasabah melakukan penyetoran, teller Bank XYZ dengan ramah menyapa dan melakukan beberapa konfirmasi atas transaksi yang akan dilakukan oleh sdri. Putri Salsabila. Adapun pada saat proses transaksi berlangsung, ternyata teller menemukan adanya 1 lembar uang palsu (pecahan Rp. 100.000) yang diterima dari nasabah pada saat melakukan pengecekan dan penghitungan mata uang yang akan disetorkan. Adapun hal ini ketika disampaikan pada nasabah yang bersangkutan merasa dirugikan dan komplain bahwa  kondisi uang yang disetorkan tidak sesuai dengan informasi yang disampaikan oleh teller. Dimana pada saat bersamaan juga terjadi antrian nasabah  yang cukup panjang membuat nasabah lain sudah menunggu lama (lebih dari 15 menit) disamping jumlah teller bank XYZ di hari itu jumlahnya terbatas tidak sebanyak biasanya. 
				</p>
				<p>
				Berdasarkan hal diatas, maka anda akan diminta untuk memposisikan diri sebagai teller bank XYZ untuk mengatasi hal yang terjadi dengan menjawab beberapa pertanyaan dibawah ini.
				</p>
				</br>
					<label>PERTANYAAN :</label>
				<br>	
					<label>1.	apabila anda memposisikan diri sebagai teller bank XYZ, maka jelaskan Langkah-langkah yang akan anda lakukan untuk menyelesaikan permasalahan yang dihadapi oleh nasabah Putri Salsabila?</label>
				</br>
					<textarea class="form-control" name="jawaban1" required=required></textarea>
				<br>
				<label>2.	Sebagai teller professional, bagaimana cara anda untuk merespon komplain yang disampaikan  nasabah lain sesuai dengan ilustrasi diatas?</label>
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