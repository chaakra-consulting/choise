<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('talent_test/layout') ?>

<div class="col-sm-12 box" style="background-color: white; padding-bottom: 20px; padding-top: 60px;">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h4><b>Subtes <?php echo $soal_subtes1->subtes; ?></b></h4>
			<h3><b>Soal Nomor <?php echo $soal_subtes1->nomor_soal ?></b></h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="timer">00:00</span></h4>
		</div>
	</div>
	<hr color="black">
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<form method="post" action="<?php echo site_url('talent-test/save-answer') ?>" id="answer_form">
			<div class="col-sm-12">
				<img src="<?php echo ($soal_subtes1->soal != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes1->soal) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 500px; margin: 10px; border-radius: 5px;">
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">a</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="A">
					<center>
						<img src="<?php echo ($soal_subtes1->opsi_a != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes1->opsi_a) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">b</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="B">
					<center>
						<img src="<?php echo ($soal_subtes1->opsi_b != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes1->opsi_b) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">c</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="C">
					<center>
						<img src="<?php echo ($soal_subtes1->opsi_c != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes1->opsi_c) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">d</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="D">
					<center>
						<img src="<?php echo ($soal_subtes1->opsi_d != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes1->opsi_d) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">e</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "E") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="E">
					<center>
						<img src="<?php echo ($soal_subtes1->opsi_e != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes1->opsi_e) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">f</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "F") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="F">
					<center>
						<img src="<?php echo ($soal_subtes1->opsi_f != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes1->opsi_f) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
			</div>
			<center>
				<input type="hidden" name="exam_type" value="cfit">
				<input type="hidden" name="question_id" value="<?php echo $soal_subtes1->nomor_soal ?>">
				<input type="hidden" name="question_number" value="<?php echo $question_number ?>">
				<input type="hidden" name="subtes" value="<?php echo $soal_subtes1->subtes ?>">
				<input type="hidden" name="target_question" id="target_question" value="">
				<div class="baten">
					<?php if ($question_number > 1) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="1"> <i class="fa fa-arrow-circle-left"></i> Sebelumnya
						</button>
					<?php } ?>
					<?php if ($question_number < $total_subtes1) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="2"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
					<?php if ($question_number >= $total_subtes1) { ?>
						<button type="submit" class="btn btn-primary" style="margin-top: 5%;" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan subtes 1?')" name="redirect" value="3">
							Subtes 2 <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
				</div>
			</center>
		</form>
	</div>
	<?php $this->load->view('talent_test/ujian/cfit/panel_cfit'); ?>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var timerElement = document.getElementById("timer");
		if (!timerElement) {
			console.error("Timer element not found");
			return;
		}
		var subtestTimes = <?php echo json_encode($this->session->userdata('talent_test_subtest_times')); ?>;
		if (!subtestTimes) {
			console.error("Subtest times not found in session");
			timerElement.innerHTML = "Waktu tidak tersedia";
			return;
		}
		var currentSubtes = <?php echo $soal_subtes1->subtes; ?>;
		var endTimeUnix = subtestTimes[currentSubtes] ? subtestTimes[currentSubtes]['end'] : null;
		if (!endTimeUnix) {
			console.error("End time for subtes " + currentSubtes + " not found");
			timerElement.innerHTML = "Waktu tidak tersedia";
			return;
		}
		var serverNow = <?php echo time(); ?>;
		var remaining = endTimeUnix - serverNow;
		var countDownDate = new Date().getTime() + remaining * 1000;

		function updateTimer() {
			var now = new Date().getTime();
			var distance = countDownDate - now;
			if (distance <= 0) {
				var nextUrl = currentSubtes < 4 ? "<?php echo base_url('talent-test/training/cfit/'); ?>" + (currentSubtes + 1) : "<?php echo base_url('talent-test/dashboard'); ?>";
				window.location.href = nextUrl;
			} else {
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				var displayMinutes = minutes < 10 ? "0" + minutes : minutes;
				var displaySeconds = seconds < 10 ? "0" + seconds : seconds;
				timerElement.innerHTML = displayMinutes + ":" + displaySeconds;

			}
		}
		setInterval(updateTimer, 1000);
		updateTimer();
	});
</script>

<?php $this->load->view('layout3/footer') ?>
