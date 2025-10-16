<?php $this->load->view('layout3/header2'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>
<?php 
$this->session->set_userdata('training_subtes', 4);
$idUjian = $this->session->userdata('talent_test_id_ujian'); 
$id_pelamar = $this->session->userdata('talent_test_user_id');
$durasi_latihan = $this->session->userdata('durasi_latihan');
if (!$durasi_latihan) {
	$durasi_latihan = 2;
}
$start_time = $this->session->userdata('training_start_time');
$start = $this->session->userdata('training_start_time');
$elapsed = time() - $start;
$remaining = max(0, ($durasi_latihan * 60) - $elapsed);
$data['end_lat1'] = (time() + $remaining) * 1000;
if ($remaining <= 0) {
	echo "<script>window.location.href = '" . base_url('talent-test/start-exam/cfit') . "'</script>";
	exit;
}
?>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3 class="page-header">Soal Latihan Subtes 4</h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time">00:00</span></h4>
		</div>
	</div><!--/.row-->

	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<h4 style="color: #fff;"><b>Petunjuk Pengerjaan Subtes 4</b></h4>
		<li style="color: #fff;">Disetiap soal terdapat sebuah kotak besar, dimana didalamnya terdapat 2 bangun yang saling beririsan satu sama lain.</li>
		<li style="color: #fff;">Irisan 2 bangun tersebut, ditandai dengan sebuah tanda titik (.)</li>
		<li style="color: #fff;">Tugas anda, Mencari kesamaan gambar soal dengan 5 pilihan gambar yang ada di masing-masing jawaban.</li>
		<li style="color: #fff;">INGAT: Tanda titik (.) akan dihilangkan pada masing-masing pilihan jawaban, sehingga visualisasikan gambar soal dgn pilihan jawaban yang tersedia.</li>
		<br>
		<li style="color: #fff;">Contoh soal:</li>
		<img src="<?php  echo base_url('upload/bank_soal/cfit/contoh12.jpg') ?>" class="img-responsive" alt="" style="width: 100px; margin: 10px; border-radius: 5px;">
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">a</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1a4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">b</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1b4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">c</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1c4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">d</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1d4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">e</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1e4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<p class="col-sm-12" style="color: #fff; margin: 10px;">Jawaban: (c). Karena pola tersebut dapat diletakkan titik yang sama seperti pada soal.</p>
	</div>

	<form method="post" action="<?php  echo base_url('talent-test/submit-training/cfit') ?>">
		<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
			<p>Soal dibawah ini merupakan soal latihan sebelum mengerjakan subtes 4. Cobalah untuk mengerjakan contoh soal di bawah ini! Apapun jawaban anda pada tahap latihan ini tidak akan dihitung poinnya.</p>
			<div class="col-sm-12">
				<p>1.</p>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/contoh22.jpg') ?>" class="img-responsive" alt="" style="width: 100px; margin: 10px; border-radius: 5px;">
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan1">a</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan1" value="a">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2a4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan1">b</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan1" value="b">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2b4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan1">c</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan1" value="c">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2c4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan1">d</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan1" value="d">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2d4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan1">e</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan1" value="e">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2e4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
			</div>
			<div class="col-sm-12" style="margin-top: 10px;">
				<p>2.</p>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/contoh32.jpg') ?>" class="img-responsive" alt="" style="width: 100px; margin: 10px; border-radius: 5px;">
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan2">a</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" value="a">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3a4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan2">b</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" value="b">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3b4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan2">c</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" value="c">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3c4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan2">d</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" value="d">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3d4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="jawaban_latihan2">e</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" value="e">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3e4.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
			</div>
		</div>
		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
			<button style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2">Selanjutnya</button>
		</div>
	</form>
</div>

<script type="text/javascript">
    var startTime = <?php echo $start_time * 1000 ?>;
    var duration = <?php echo $durasi_latihan * 60 * 1000 ?>;
    var countDownDate = startTime + duration;

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("time").innerHTML = "00:00";
            window.location.href = '<?php echo base_url('talent-test/start-exam/cfit'); ?>';
        } else {
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            var displayMinutes = minutes < 10 ? "0" + minutes : minutes;
            var displaySeconds = seconds < 10 ? "0" + seconds : seconds;
            document.getElementById("time").innerHTML = displayMinutes + ":" + displaySeconds;
        }
    }, 1000);
</script>

<?php   $this->load->view('layout3/footer') ?>