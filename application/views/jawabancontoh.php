<?php $this->load->view('layout3/header2') ?>
<?php $this->load->view('layout3/navbar') ?>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3>Soal Latihan</h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time"></span> detik</h4>
		</div>
	</div><!--/.row-->
	<?php  
	$idUjian=  $this->session->userdata('ses_ujian');
	$ujian = $this->db->query("SELECT * FROM tb_ujian WHERE id_ujian = ?", array($idUjian));

	foreach ($ujian->result() as $key ) {
		$end_lat1 = $key->end_lat_sub1;
	}
	?>

	<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
		<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
			<div class="col-sm-12">
				<!-- $jawaban1 =  -->
				<p>1. Jawaban:  (jawaban anda <?php echo $this->session->userdata('ses_jawab1') ?>)</p>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit11">e</label>
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div style="padding-top: 3.9%">
					<p> Jawaban yang benar</p>
				</div>
			</div>
			<div class="col-sm-12" style="margin-top: 10px;">
				<p>2. Jawaban:  (jawaban anda <?php echo $this->session->userdata('ses_jawab2') ?>)</p>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit12">e</label>
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div style="padding-top: 3.9%">
					<p> Jawaban yang benar</p>
				</div>
			</div>
		</div>
		<?php $id_pelamar = $this->session->userdata('ses_id');
		$id_ujian = $this->session->userdata('ses_ujian');
		?>
		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
			<a href="<?php  echo base_url('Pelamar/Ujian/start_ujian/'.$id_ujian.'/1') ?>" class="btn btn-primary mr-2 mb-2">Mulai Sekarang</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	var countDownDate = new Date("<?php echo $end_lat1 ?>").getTime();
	var x = setInterval(function() {
		var now = new Date().getTime();
		var distance = countDownDate - now;
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		document.getElementById("time").innerHTML = minutes + " : " + seconds + " ";
		if (distance < 0) {
			clearInterval(x);
			alert('Waktu latian subtes 1 sudah berakhir, selamat mengerjakan subtes 1');
			window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian/'.$idUjian.'/1'); ?>';
		}
	}, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>