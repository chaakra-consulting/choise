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
	$ujian = $this->db->query("SELECT * FROM tb_ujian_cfit_2a WHERE id_ujian = ?", array($idUjian));

	foreach ($ujian->result() as $key ) {
		$end_lat2 = $key->end_lat_sub2;
	}
	?>

	<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
		<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
			<div class="col-sm-12">
				<!-- $jawaban1 =  -->
				<p>1. Jawaban:  (jawaban anda <?php echo $this->session->userdata('ses_jawab1') ?>)</p>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit11">A</label>
					<center>
						<img src="<?php  echo base_url('assets3/images/CFIT 2a/Tes 2/Contoh 2/a.png') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div style="padding-top: 3.9%">
					<p> Jawaban yang benar (Karena lingkaran No. 1 berwarna hitam, sedangkan 4 lingkaran lainnya berwarna putih.)</p>
				</div>
			</div>
			
		</div>
		<?php $id_pelamar = $this->session->userdata('ses_id');
		$id_ujian = $this->session->userdata('ses_ujian');
		?>
		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
			<a href="<?php  echo base_url('Pelamar/Ujian/start_ujian_cfit_2a_subtes_2/'.$id_ujian.'/1') ?>" class="btn btn-primary mr-2 mb-2">Mulai Sekarang</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	var countDownDate = new Date("<?php echo $end_lat2 ?>").getTime();
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
			alert('Waktu latian subtes 2 sudah berakhir, selamat mengerjakan subtes 2');
			window.location.href = '<?php echo base_url('Pelamar/Ujian/start_ujian_cfit_2a_subtes_2/'.$idUjian.'/1'); ?>';
		}
	}, 1000);
</script>

<?php $this->load->view('layout3/footer') ?>