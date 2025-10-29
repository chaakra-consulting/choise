<?php $this->load->view('layout3/header2'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>
<?php 
$this->session->set_userdata('training_subtes', 3);
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
			<h3 class="page-header">Soal Latihan Subtes 3</h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time">00:00</span></h4>
		</div>
	</div><!--/.row-->

	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<h4 style="color: #fff;"><b>Petunjuk Pengerjaan Subtes 3</b></h4>
		<li style="color: #fff;">Disetiap soal terdapat sebuah kotak besar, dimana didalamnya terdapat 4 buah kotak kecil.</li>
		<li style="color: #fff;">Tiga kotak kecil diantaranya sudah terisi dengan pola/urutan tertentu.</li>
		<li style="color: #fff;">Tugas anda: Carilah 1 dari 5 pilihan jawaban yang ada untuk mengisi kotak kosong ke-4 sehingga menjadi berurutan satu sama lain!</li>
		<br>
		<li style="color: #fff;">Contoh soal:</li>
		<img src="<?php  echo base_url('upload/bank_soal/cfit/contoh11.jpg') ?>" class="img-responsive" alt="" style="width: 150px; margin: 10px; border-radius: 5px;">
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">a</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1a3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">b</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1b3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">c</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1c3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">d</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1d3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">e</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1e3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">f</p>
			<center>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/1f3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<p class="col-sm-12" style="color: #fff; margin: 10px;">Jawaban: (b). Karena sesuai untuk mengisi kotak kecil yang kosong tersebut</p>
	</div>
	<form method="post" action="<?php  echo base_url('talent-test/submit-training/cfit') ?>">
		<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
			<p>Soal dibawah ini merupakan soal latihan sebelum mengerjakan subtes 3. Cobalah untuk mengerjakan contoh soal di bawah ini! Apapun jawaban anda pada tahap latihan ini tidak akan dihitung poinnya.</p> <b>HANYA DAPAT MEMILIH 2 JAWABAN, JIKA TERDPAT KESALAHAN, SILAHKAN UNCHECK YANG SALAH DAN CHECKLIST PADA YANG BENAR</b><br>
			<div class="col-sm-12">
				<p>1.</p>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/contoh21.jpg') ?>" class="img-responsive" alt="" style="width: 150px; margin: 10px; border-radius: 5px;">
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31a">a</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit31a" value="a">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2a3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31b">b</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit31b" value="b">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2b3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31c">c</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit31c" value="c">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2c3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31d">d</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit31d" value="d">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2d3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31e">e</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit31e" value="e">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2e3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31f">f</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit31f" value="f">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/2f3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
			</div>
			<div class="col-sm-12" style="margin-top: 10px;">
				<p>2.</p>
				<img src="<?php  echo base_url('upload/bank_soal/cfit/contoh31.jpg') ?>" class="img-responsive" alt="" style="width: 150px; margin: 10px; border-radius: 5px;">
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit32a">a</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit32a" value="a">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3a3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit32b">b</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit32b" value="b">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3b3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit32c">c</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit32c" value="c">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3c3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit32d">d</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit32d" value="d">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3d3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit32e">e</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit32e" value="e">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3e3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit32f">f</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" id="latcfit32f" value="f">
					<center>
						<img src="<?php  echo base_url('upload/bank_soal/cfit/3f3.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
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

<?php $this->load->view('layout3/footer') ?>