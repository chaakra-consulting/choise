<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('talent_test/layout') ?>

<div class="col-sm-12 box" style="background-color: white; padding-bottom: 20px; padding-top: 60px;">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h4><b>Subtes <?php echo $soal_subtes2->subtes; ?></b></h4>
			<h4>Subtes ini hanya dapat memilih 2 jawaban, jika terdapat kesalahan silahkan uncheck!</h4>
			<h3><b>Soal Nomor <?php echo $soal_subtes2->nomor_soal ?></b></h3>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="timer">00:00</span></h4>
		</div>
	</div>
	<hr color="black">
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<div class="col-sm-12">
			<form method="post" action="<?php echo site_url('talent-test/save-answer') ?>" id="answer_form">
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">a</label>
					<input class="form-check-input checkbox-limit" type="checkbox" <?php if (is_array($user_answer) && in_array('A', $user_answer)) echo 'checked'; ?> name="answer[]" value="A">
					<center>
						<img src="<?php echo ($question['opsi_a'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_a']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">b</label>
					<input class="form-check-input checkbox-limit" type="checkbox" <?php if (is_array($user_answer) && in_array('B', $user_answer)) echo 'checked'; ?> name="answer[]" value="B">
					<center>
						<img src="<?php echo ($question['opsi_b'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_b']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">c</label>
					<input class="form-check-input checkbox-limit" type="checkbox" <?php if (is_array($user_answer) && in_array('C', $user_answer)) echo 'checked'; ?> name="answer[]" value="C">
					<center>
						<img src="<?php echo ($question['opsi_c'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_c']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">d</label>
					<input class="form-check-input checkbox-limit" type="checkbox" <?php if (is_array($user_answer) && in_array('D', $user_answer)) echo 'checked'; ?> name="answer[]" value="D">
					<center>
						<img src="<?php echo ($question['opsi_d'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_d']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit2">e</label>
					<input class="form-check-input checkbox-limit" type="checkbox" <?php if (is_array($user_answer) && in_array('E', $user_answer)) echo 'checked'; ?> name="answer[]" value="E">
					<center>
						<img src="<?php echo ($question['opsi_e'] != '' ? base_url('./upload/bank_soal/cfit/' . $question['opsi_e']) : 
                            base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
		</div>
		<center>
			<input type="hidden" name="exam_type" value="cfit">
			<input type="hidden" name="question_id" value="<?php echo $question['nomor_soal'] ?>">
			<input type="hidden" name="question_number" value="<?php echo $question_number ?>">
			<input type="hidden" name="subtes" value="<?php echo $question['subtes'] ?>">
			<input type="hidden" name="target_question" id="target_question" value="">
			<div class="baten">
				<?php if ($question_number != 1) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="1"> <i class="fa fa-arrow-circle-left"></i> Sebelumnya
					</button>
				<?php } ?>
				<?php if (!($question_number == ($total_subtes1 + $total_subtes2) && $soal_subtes1->subtes == 2)) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" name="redirect" value="2"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
					</button>
				<?php } ?>
				<?php if ($question_number == ($total_subtes1 + $total_subtes2) && $soal_subtes1->subtes == 2) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan subtes 2?')" name="redirect" value="4">
						 Subtes 3 <i class="fa fa-arrow-circle-right"></i>
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

<script>
$(document).ready(function() {
    $('.checkbox-limit').on('change', function() {
        if ($('.checkbox-limit:checked').length > 2) {
            $(this).prop('checked', false);
            alert('Hanya dapat memilih 2 jawaban!');
        }
    });
});
</script>
