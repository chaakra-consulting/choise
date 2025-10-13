<?php $this->load->view('layout3/header2'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

<div class="col-sm-12 main">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h3>Soal Latihan</h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu latihan <span id="time">00:00</span></h4>
		</div>
	</div><!--/.row-->

	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<h4 style="color: #fff;"><b>Petunjuk Pengerjaan Subtes 1</b></h4>
		<p style="color: #fff;">Disetiap soal terdapat 4 buah kotak, dimana 3 kotak diantaranya sudah terisi dengan gambar dengan pola tertentu yang berurutan. Tugas anda, carilah 1 gambar untuk mengisi kotak kosong terakhir berdasarkan 5 pilihan jawaban yang tersedia sehingga menjadi berurutan satu sama lain.</p><br>
		<p style="color: #fff;">Contoh soal:</p>
		<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/contoh1.jpg') ?>" class="img-responsive" alt="" style="width: 300px; margin: 10px; border-radius: 5px;">
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">a</p>
			<center>
				<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1a.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">b</p>
			<center>
				<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1b.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">c</p>
			<center>
				<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1c.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">d</p>
			<center>
				<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1d.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">e</p>
			<center>
				<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">f</p>
			<center>
				<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/1f.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<p class="col-sm-12" style="color: #fff; margin: 10px;">Jawaban: (c) karena ranting pohon perlahan bergerak ke kanan.</p>
	</div>
	<?php 
	$idUjian = $this->session->userdata('ses_ujian'); 
	$id_pelamar = $this->session->userdata('talent_test_user_id');
	$subtes = $this->session->userdata('training_subtes') ?? 1;  // Ambil subtes dari session

	$durasi_latihan = $this->session->userdata('durasi_latihan');
	if (!$durasi_latihan) {
		$durasi_latihan = 2;
	}
	$start_key = 'training_start_time_sub' . $subtes;
	$start_time = $this->session->userdata($start_key);
	if (!$start_time) {
		$start_time = time();
		$this->session->set_userdata($start_key, $start_time);
	}
	$elapse = time() - $start_time;
	$remaining = ($durasi_latihan * 60) - $elapse;
	?>
	<form method="post" action="<?php  echo base_url('talent-test/submit-training/cfit') ?>">
		<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
			<p>Soal dibawah ini merupakan soal latihan sebelum mengerjakan subtes 1. Cobalah untuk mengerjakan contoh soal di bawah ini! Apapun jawaban anda pada tahap latihan ini tidak akan dihitung poinnya.</p>
			<div class="col-sm-12">	
				<p>1.</p>
				<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/contoh2.jpg') ?>" class="img-responsive" alt="" style="width: 300px; margin: 10px; border-radius: 5px;">
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit11">a</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="a">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2a.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit11">b</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="b">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2b.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit11">c</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="c">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2c.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit11">d</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="d">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2d.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit11">e</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="e">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit11">f</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan" id="latcfit11" value="f">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/2f.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
			</div>
			<div class="col-sm-12" style="margin-top: 10px;">
				<p>2.</p>
				<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/contoh3.jpg') ?>" class="img-responsive" alt="" style="width: 300px; margin: 10px; border-radius: 5px;">
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit12">a</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="a">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3a.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit12">b</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="b">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3b.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit12">c</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="c">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3c.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit12">d</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="d">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3d.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit12">e</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="e">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit12">f</label>
					<input class="form-check-input" type="radio" name="jawaban_latihan2" id="latcfit12" value="f">
					<center>
						<img src="<?php  echo base_url('assets3/images/soalcfit/subtes1/contoh/3f.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
			</div>
		</div>
		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px; margin-bottom: 20px">
			<button type="submit" class="btn btn-primary mr-2 mb-2">Selanjutnya</button>
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
            alert('Waktu latihan sudah berakhir, silakan lanjut ke subtes berikutnya.');
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