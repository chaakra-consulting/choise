<?php $this->load->view('layout3/header2') ?>

<?php $this->load->view('layout3/navbar') ?>



<div class="col-sm-12 main">



	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-9">

			<h3>TPA PENALARAN</h3>

		</div>

		<div class="col-lg-3">

			<h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="time3"></span> detik</h4>

		</div>

	</div>
	<!--/.row-->

	<?php


	$dbsoal = 'tb_soal_tpa';
	$dbjawaban = 'tb_data_jawaban_tpa2';
	$dbwaktu = 'tb_ujian_tpa_penalaran2';
	$id_ujian =  $this->session->userdata('ses_tpa');

	$nomor = $array[0]->nomor_soal;
	// echo $nomor;

	$ujian = $this->db->query("SELECT * FROM $dbwaktu WHERE id_ujian = $id_ujian");

	foreach ($ujian->result() as $key) {

		$end_ = $key->waktu_akhir;
	}

	?>

	<iframe id="frame" src="<?php echo base_url('Pelamar/Ujian/frame_ujian_tpa2_3/' . $id_ujian . '/' . $nomor) ?>" width="100%" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';" frameborder="0">Browser Anda Tidak Mendukung Iframe, Silahkan Perbaharui Browser Anda.</iframe>



</div>

</div>
<!--/.row-->



</div>
<!--/.main-->





<script type="text/javascript">
	var countDownDate = new Date("<?php echo $end_ ?>").getTime();



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

		document.getElementById("time3").innerHTML = hours + " : " + minutes + " : " + seconds + " ";



		// If the count down is finished, write some text

		if (distance < 0) {

			clearInterval(x);

			// document.getElementById("time").innerHTML = "EXPIRED";

			alert('Waktu Ujian TPA Penalaran Telah Berakhir');

			window.location.href = '<?php echo base_url('Pelamar/Pelamar/testulispsikotes/' . $id_ujian); ?>';



			// document.getElementById('hentikan').click();

		}

	}, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>