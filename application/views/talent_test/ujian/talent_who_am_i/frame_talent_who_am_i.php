<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('talent_test/layout') ?>

<div class="col-sm-12 box" style="background-color: white; padding-bottom: 20px; padding-top: 60px;">
	<div class="row" style="margin-bottom: -50px;">
		<div class="col-lg-9">
			<h4><b>TALENT TEST: WHO AM I?</b></h4>
		</div>
		<div class="col-lg-3">
			<h4 style="margin-top: 35px" align="right">Waktu Ujian <span id="timer">00:00</span></h4>
		</div>
	</div>
	<hr color="black">
	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
		<center>
		<h2 style="color: #fff;"><b>Who Am I?</b></h2>
		</center>
		<p style="color: #fff">Berikanlah 10 pernyataan tentang pribadi Anda yang menjelaskan tentang kebiasaan-kebiasaan
		Anda, meliputi 5 kelebihan dan 5 kelemahan Anda (namun tidak terkait dengan hal - hal
		yang bersifat fisik)</p>
		<label style="color: #fff">Contoh :</label>
		<br>
		<li style="color: #fff; margin-left: 50px">
			Saya memiliki tubuh yang tinggi untuk ukuran pria Indonesia pada umumnya
				<img src="<?php echo base_url('upload/bank_soal/talent/wrong.png') ?>" alt="" style="width: 30px; border-radius: 5px; margin-left: 20px">
		</li>
		<br>
		<li style="color: #fff; margin-left: 50px">
			Saya ingin menyelesaikan sesuatu sesempurna mungkin
				<img src="<?php echo base_url('upload/bank_soal/talent/correct.png') ?>" alt="" style="width: 30px; border-radius: 5px; margin-left: 170px">
		</li>
	</div>
	<div class="col-md-12 col-sm-12" style="margin-bottom: 5px;">
		<form method="post" action="<?php echo site_url('talent-test/save-answer') ?>" id="answer_form">
			<div class="container">
				<div class="col-sm-12" style="background-color: #fff;">
					<div class="form-row">
						<div class="form-group">
							<br>
							<label>1. ( 5 ) Kelebihan saya adalah :</label>
							<br>
								<textarea class="form-control" name="jawaban1" rows="7" required><?php echo $user_answer['jawaban1'] ?? ''; ?></textarea>
							<br>
							<label>2. ( 5 ) Kekurangan saya adalah :</label>
							<br>
								<textarea class="form-control" name="jawaban2" rows="7" required><?php echo $user_answer['jawaban2'] ?? ''; ?></textarea>
							<br>
							<label>3. Dalam 5 (lima) tahun mendatang, saya menggambarkan diri saya (boleh lebih dari satu) :</label>
							<br>
								<textarea class="form-control" name="jawaban3" rows="3" required><?php echo $user_answer['jawaban3'] ?? ''; ?></textarea>
							<br>
						</div>
					</div>
				</div>
			</div>
			<center>
				<input type="hidden" name="exam_type" value="talent_who_am_i">
				<input type="hidden" name="question_id" value="1">
				<div class="baten">
					<button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan ujian?')" name="redirect" value="3">
						Selesaikan Ujian <i class="fa fa-check"></i>
					</button>
				</div>
			</center>
		</form>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var timerElement = document.getElementById("timer");
		if (!timerElement) {
			console.error("Timer element not found");
			return;
		}
		var endTime = <?php echo $this->session->userdata('talent_test_end_time'); ?> * 1000;
		if (!endTime) {
			console.error("End time not found in session");
			timerElement.innerHTML = "Waktu tidak tersedia";
			return;
		}
		var serverNow = <?php echo time(); ?> * 1000;
		var remaining = endTime - serverNow;
		var countDownDate = new Date().getTime() + remaining;

		function updateTimer() {
			var now = new Date().getTime();
			var distance = countDownDate - now;
			if (distance <= 0) {
				clearInterval(timerInterval);
				alert('Waktu ujian telah habis. Jawaban Anda akan dikirim otomatis.');
				document.getElementById('answer_form').submit();
			} else {
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				var displayMinutes = minutes < 10 ? "0" + minutes : minutes;
				var displaySeconds = seconds < 10 ? "0" + seconds : seconds;
				timerElement.innerHTML = displayMinutes + ":" + displaySeconds;
			}
		}
		var timerInterval = setInterval(updateTimer, 1000);
		updateTimer();
	});
</script>

<?php $this->load->view('layout3/footer') ?>