<?php $this->load->view('layout3/header2'); ?>
<?php $this->load->view('layout3/navbar'); ?>
<?php $this->load->view('talent_test/layout'); ?>

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
		<li style="color: #fff;">Disetiap soal terdapat 5 kotak  yang didalamnya memiliki gambar yang berbeda-beda, dimana 3 kotak diantaranya memiliki gambar yang sama.</li>
		<li style="color: #fff;">Tugas anda, carilah 2 kotak dengan gambar yang berbeda dari 3 diantaranya. Kemudian isikan 2 (dua) abjadnya pada pilihan jawaban yang tersedia di masing-masing soal.</li>
		<li style="color: #fff;">INGAT: 1 Soal berisi 2 jabawan!</li>
		<br>
		<li style="color: #fff;">Contoh soal:</li>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">a</p>
			<center>
				<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_3a.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">b</p>
			<center>
				<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_3b.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">c</p>
			<center>
				<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_3c.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">d</p>
			<center>
				<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_3d.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<div class="form-check col-sm-1 text-center" style="margin: 5px;">
			<p style="color: #fff;">e</p>
			<center>
				<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_3e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
			</center>
		</div>
		<p class="col-sm-12" style="color: #fff; margin: 10px;">Jawaban: (b) dan (d). Karena memiliki bukan berbentuk segitiga seperti yang lainnya.</p>
	</div>

	<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">
		<p>Soal dibawah ini merupakan soal latihan sebelum mengerjakan subtes 3. Cobalah untuk mengerjakan contoh soal di bawah ini! Apapun jawaban anda pada tahap latihan ini tidak akan dihitung poinnya.</p> <b>HANYA DAPAT MEMILIH 2 JAWABAN, JIKA TERDPAT KESALAHAN, SILAHKAN UNCHECK YANG SALAH DAN CHECKLIST PADA YANG BENAR</b><br>
		<div class="col-sm-12">

			<?php 
            $CI =& get_instance();
            $CI->session->set_userdata('training_subtes', 3);
            $idUjian = $CI->session->userdata('talent_test_id_ujian'); 
			$id_pelamar = $CI->session->userdata('talent_test_user_id');

			$durasi_latihan = $CI->session->userdata('durasi_latihan');
			if (!$durasi_latihan) {
				$durasi_latihan = 2;
			}
			$start_time = $CI->session->userdata('training_start_time');
			$start = $CI->session->userdata('training_start_time');
			$elapsed = time() - $start;
			$remaining = max(0, ($durasi_latihan * 60) - $elapsed);
			$data['end_lat1'] = (time() + $remaining) * 1000;

			if ($remaining <= 0) {
				echo "<script>window.location.href = '" . base_url('talent-test/start-exam/cfit') . "'</script>";
				exit;
			}
			?>

			<form method="post" action="<?php  echo base_url('talent-test/submit-training/cfit') ?>">

				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31">a</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" value="a">
					<center>
						<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_33a.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31">b</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" value="b">
					<center>
						<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_33b.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31">c</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" value="c">
					<center>
						<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_33c.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31">d</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" value="d">
					<center>
						<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_33d.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-1 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="latcfit31">e</label>
					<input class="form-check-input" type="checkbox" name="jawaban_latihan[]" value="e">
					<center>
						<img src="<?php  echo base_url('Upload/bank_soal/cfit/contoh_33e.jpg') ?>" class="img-responsive" alt="" style="width: 50px; border-radius: 5px;">
					</center>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
	</div>
</div><!--/.row-->
</div>	<!--/.main-->

<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">
	<button style="margin-bottom: 2%" type="submit"class="btn btn-primary mr-2 mb-2">Selanjutnya</button>
	</div>
</form>

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