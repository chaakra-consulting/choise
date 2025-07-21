<?php $this->load->view('layout3/header') ?>
<style>
    /* Mengatur ukuran teks untuk nomor soal dan soal */
    .question {
        text-align: justify;
    }
</style> 	
<div class="col-sm-12 box">
	<div class="col-sm-12">
		<h3><b class="question-number">Email <?php echo $tray->nomor_soal ?></b></h3>
		<h5>Cermati isi-isi dari email berikut dan tunggu waktu berakhir untuk mengerjakan soal</h5>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-9 col-sm-12" style="margin-bottom: 5px;">
		<form method="post">
			<div style="width: 800px; margin: 10px; border-radius: 5px; border-radius: 5px ">
			<p class="question-text"><?php echo $tray->soal; ?></p>
			</div>	

		</form>
	</div>
	<?php
	$this->load->view('pelamar/ujian/tray/panel_ujian');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>