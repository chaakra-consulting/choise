<?php $this->load->view('layout3/header') ?>

<div class="col-sm-12 box">
	<div class="col-sm-6">
		<h4><b>Subtes <?php echo $soal_subtes4->subtes; ?> - <?php echo $soal_subtes4->jenis_soal; ?></b></h4>
		
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<div class="col-sm-12">
			<form method="post">

			<div style="width: 600px; text-align:justify; margin: 10px; border-radius: 5px; border-radius: 5px">
			<h5><b>Soal Nomor <?php echo $soal_subtes4->nomor_soal ?></b></h5>
				<?php echo $soal_subtes4->soal; ?>
			

			<br><br>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban4->jawaban) && $jawaban4->jawaban == "A") { ?> checked="checked" <?php } ?> name="jawaban" value="A">
				<label class="form-check-label" for="skd1">a. </label>
				<!-- <center> -->
				<?php echo $soal_subtes4->opsi_a; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban4->jawaban) && $jawaban4->jawaban == "B") { ?> checked="checked" <?php } ?> name="jawaban" value="B">
				<label class="form-check-label" for="skd1">b. </label>
				<!-- <center> -->
				<?php echo $soal_subtes4->opsi_b; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban4->jawaban) && $jawaban4->jawaban == "C") { ?> checked="checked" <?php } ?> name="jawaban" value="C">
				<label class="form-check-label" for="skd1">c. </label>
				<!-- <center> -->
				<?php echo $soal_subtes4->opsi_c; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban4->jawaban) && $jawaban4->jawaban == "D") { ?> checked="checked" <?php } ?> name="jawaban" value="D">
				<label class="form-check-label" for="skd1">d. </label>
				<!-- <center> -->
				<?php echo $soal_subtes4->opsi_d; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban4->jawaban) && $jawaban4->jawaban == "E") { ?> checked="checked" <?php } ?> name="jawaban" value="E">
				<label class="form-check-label" for="skd1">e. </label>
				<!-- <center> -->
				<?php echo $soal_subtes4->opsi_e; ?>
				<!-- </center> -->
			</div>
			</div>
		</div>
		<center>


			<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
			<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
			<input type="hidden" name="id_ujian" value="<?php echo $this->session->userdata('ses_ujian') ?>">
			<input type="hidden" name="nomor_soal" value="<?php echo $soal_subtes4->nomor_soal ?>">
			<input type="hidden" name="subtes" value="<?php echo $soal_subtes4->subtes ?>">
			<input type="hidden" name="jenis_soal" value="<?php echo $soal_subtes4->jenis_soal ?>">
			<div class="baten">
				<?php if ($soal_subtes4->nomor_soal != 1 && $soal_subtes4->subtes == 4) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_skd4/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
					</button>
				<?php } ?>
				<!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_skd1/0') ?>"> Konfirmasi -->
				</button>
				<?php if ($soal_subtes4->nomor_soal != 25 && $soal_subtes4->subtes == 4) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_skd4/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
					</button>
				<?php } ?>
				<?php if ($soal_subtes4->nomor_soal >= 25 && $soal_subtes4->subtes == 4) { ?>
					<button type="submit" style="margin-top: 5%" class="btn btn-info" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_skd_endSub4') ?>" class="btn btn-primary"> Subtes 5 <i class="fa fa-arrow-circle-right"></i>
					</button>
				<?php } ?>
			</div>
		</center>

		</form>
	</div>	
	<?php
	$this->load->view('pelamar/ujian/skd/panel_ujian_4');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>