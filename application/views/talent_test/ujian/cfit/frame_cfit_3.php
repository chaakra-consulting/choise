<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('talent_test/layout') ?>

<div class="col-sm-12 box" style="background-color: white; padding-bottom: 20px; padding-top: 60px;">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h4><b>Subtes <?php echo $soal_subtes3->subtes; ?></b></h4>
			<h3><b>Soal Nomor <?php echo $soal_subtes3->nomor_soal ?></b></h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="timer">00:00</span></h4>
		</div>
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<div class="col-sm-12">
			<form method="post" action="<?php echo site_url('talent-test/save-answer') ?>" id="answer_form">
				<img src="<?php echo ($soal_subtes3->soal != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes3->soal) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 500px; margin: 10px; border-radius: 5px;">
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit3">a</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban3->jawaban) && $jawaban3->jawaban == "A") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="A">
					<center>
						<img src="<?php echo ($soal_subtes3->opsi_a != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes3->opsi_a) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit3">b</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban3->jawaban) && $jawaban3->jawaban == "B") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="B">
					<center>
						<img src="<?php echo ($soal_subtes3->opsi_b != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes3->opsi_b) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit3">c</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban3->jawaban) && $jawaban3->jawaban == "C") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="C">
					<center>
						<img src="<?php echo ($soal_subtes3->opsi_c != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes3->opsi_c) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit3">d</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban3->jawaban) && $jawaban3->jawaban == "D") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="D">
					<center>
						<img src="<?php echo ($soal_subtes3->opsi_d != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes3->opsi_d) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit3">e</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban3->jawaban) && $jawaban3->jawaban == "E") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="E">
					<center>
						<img src="<?php echo ($soal_subtes3->opsi_e != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes3->opsi_e) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit3">f</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban3->jawaban) && $jawaban3->jawaban == "F") { ?> checked="checked" <?php } ?> name="answer[jawaban]" value="F">
					<center>
						<img src="<?php echo ($soal_subtes3->opsi_f != '' ? base_url('./upload/bank_soal/cfit/' . $soal_subtes3->opsi_f) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
		</div>
		<center>
			<input type="hidden" name="exam_type" value="cfit">
			<input type="hidden" name="question_id" value="<?php echo $soal_subtes3->nomor_soal ?>">
			<input type="hidden" name="question_number" value="<?php echo $question_number ?>">
			<input type="hidden" name="subtes" value="<?php echo $soal_subtes3->subtes ?>">
			<input type="hidden" name="target_question" id="target_question" value="">
			<div class="baten">
				<?php if ($question_number != 1) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="1"> <i class="fa fa-arrow-circle-left"></i> Sebelumnya
					</button>
				<?php } ?>
				<?php if (!($question_number == ($total_subtes1 + $total_subtes2 + $total_subtes3) && $soal_subtes3->subtes == 3)) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="2"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
					</button>
				<?php } ?>
				<?php if ($question_number == ($total_subtes1 + $total_subtes2 + $total_subtes3) && $soal_subtes3->subtes == 3) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan subtes 3?')" name="redirect" value="5">
						 Subtes 4 <i class="fa fa-arrow-circle-right"></i>
					</button>
				<?php } ?>
			</div>
		</center>
		</form>
	</div>
	<?php $this->load->view('talent_test/ujian/cfit/panel_cfit'); ?>
</div>

<script type="text/javascript">
    var subtestTimes = <?php echo json_encode($this->session->userdata('talent_test_subtest_times')); ?>;
    if (subtestTimes && subtestTimes[3]) {
        var endTime = subtestTimes[3]['end'] * 1000;
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = endTime - now;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "00:00";
                window.location.href = '<?php echo base_url('talent-test/exam/cfit/frame/' . ($question_number + 1)); ?>';
            } else {
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                var displayMinutes = minutes < 10 ? "0" + minutes : minutes;
                var displaySeconds = seconds < 10 ? "0" + seconds : seconds;
                document.getElementById("timer").innerHTML = displayMinutes + ":" + displaySeconds;
            }
        }, 1000);
    } else {
        document.getElementById("timer").innerHTML = "No Timer";
    }
</script>

<?php $this->load->view('layout3/footer') ?>