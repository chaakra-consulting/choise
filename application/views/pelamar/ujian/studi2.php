<?php $this->load->view('layout3/header2'); ?>
<?php $this->load->view('layout3/navbar'); ?>

<?php
$id_pelamar = $this->session->userdata('ses_id');
$idStudi = $this->session->userdata('ses_ujianStudi2');
$idLowongan = $this->session->userdata('sesIdLowongan');

$studi2 = $this->db->query("SELECT * FROM tb_ujian_kasus2 WHERE id_ujian_studi2 = '$idStudi'");

$timeStudi = '';
foreach ($studi2->result() as $key_uStudi2) {
	$timeStudi = $key_uStudi2->waktu_akhir;
}
?>

<style>
	p
	{
        color: #000;
		text-align: justify;
    }

</style>

<div class="col-sm-12 main">
    <div class="row" style="margin-bottom: -50px;">
        <div class="col-lg-9">
            <h3 class="page-header" style="margin-top: 15px">Studi Kasus: Permasalahan Keterlambatan Pelunasan Pinjaman di Bagian Administrasi Pembiayaan Bank MNO</h3>
        </div>
        <div class="col-lg-3">
            <h4 style="margin-top: 35px" align="right">Waktu pengerjaan <span id="time"></span> detik</h4>
        </div>
    </div>

    <div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
        <h4 style="color: #fff;"><b>Petunjuk Pengisian</b></h4>
        <p style="color: #fff">Jawablah beberapa pertanyaan di bawah ini sesuai dengan pemahaman yang Anda miliki saat ini secara singkat dan jelas!</p>
    </div>



		<div class="container">
        <div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
            <form action="<?php echo base_url("Pelamar/Ujian/jawaban_studi2/"); ?>" method="post">
		<input type="hidden" name="id_ujian" value="<?php echo $idStudi; ?>">
		<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar; ?>">
		<input type="hidden" name="id_lowongan" value="<?php echo $idLowongan; ?>">

				<div class="form-group">



				<br><label>STUDI KASUS</label></br>
				<br>
					<label>
					<u>PERSOALAN</u>
					</label>
				</br>
					

				<br>
						<p>
						Bank MNO mengalami kendala dalam administrasi pembiayaan terkait keterlambatan pelunasan pinjaman pembayaran kedua oleh nasabah. Pada 14 November 2023 nasabah atas nama Erika Carlina datang ke bank MNO menyampaikan bahwa dirinya mengalami kesulitan memenuhi kewajiban pembayaran tepat waktu, yang mengakibatkan adanya penundaan dalam siklus pembayaran. Keterlambatan ini berdampak pada kinerja bagian administrasi pembiayaan karena mereka harus melakukan pemantauan lebih lanjut, menambah beban kerja staf administrasi untuk memastikan kelancaran proses pembayaran. Staf Administrasi Pembayaran melakukan penjadwalan ulang yang dilaksanakan pada 14 Februari 2024 dikarenakan kendala yang dialami nasabah
						</p></br>
						<p>	
						Empat bulan berikutnya tepatnya pada 14 Februari 2024 nasabah Erika Carlina tidak datang untuk melakukan pembayaran kedua seperti jadwal yang sudah ditentukan oleh pihak bank. Hal demikian mengganggu proses administrasi pembayaran dikarenakan sudah melewati masa jatuh tempo lebih dari tiga bulan dari jadwal yang sudah ditentukan oleh Staf Administrasi Pembiayaan Bank MNO. Pihak bank, melalui staf administrasi pembiayaan, berupaya menjalin komunikasi aktif dengan nasabah, baik melalui telepon, pesan singkat, maupun email untuk mengingatkan tenggat waktu pembayaran dan mengedukasi nasabah tentang pentingnya menjaga riwayat kredit yang baik.
						</p></br>
						<p>	
						Dengan jumlah kasus keterlambatan yang semakin meningkat, staf administrasi pembiayaan harus bekerja ekstra keras untuk memastikan bahwa proses pemulihan berjalan lancar, tanpa mengganggu pelayanan terhadap nasabah lainnya. Upaya ini membutuhkan alokasi waktu dan sumber daya yang lebih besar dari yang direncanakan, yang pada akhirnya dapat menambah beban biaya operasional bank.
						</p></br>
						<p>	
						Berdasarkan hal diatas, maka anda akan diminta untuk memposisikan diri sebagai Staf Administrasi Pembiayaan bank MNO untuk mengatasi hal yang terjadi dengan menjawab beberapa pertanyaan dibawah ini. 
						</p></br>
						
					</br>
					<label>
					<u>PERTANYAAN</u>

					</label>

				
					<br>

						<p>

						1.	Apabila anda memposisikan diri sebagai staf administrasi pembiayaan bank MNO, maka jelaskan Langkah-langkah yang akan anda lakukan untuk menyelesaikan permasalahan yang dihadapi oleh nasabah Erika Carlina? 

						</p>

					</br>

					<textarea class="form-control" name="jawaban1" required></textarea>

				<br>	
				
					<p> 2.	Sebagai staf administrasi pembiayaan professional bank MNO, bagaimana strategi anda untuk meminimalkan risiko keterlambatan pembayaran pinjaman dari nasabah lain di masa mendatang?

					</p>

					<textarea class="form-control" name="jawaban2" required></textarea>

					

				</div>

				

			</div>



		</div>



		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">

			<input style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2" value="Kirim Jawaban">

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