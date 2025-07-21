<?php $this->load->view('layout3/header') ?>
<div class="col-sm-12 box">
	<div class="col-sm-6">
	<h4><b>Soal Nomor <?php echo $tkp->nomor_soal ?></b></h4>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-8 col-sm-12" style="margin-bottom: 5px;">
		<div class="col-sm-12">
			<form method="post">

			<div style="width: auto; text-align:justify; margin: auto; border-radius: auto; border-radius: auto">
		
				<?php echo $tkp->soal; ?>
			<br><br>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?> name="jawaban" value="A">
				<label class="form-check-label" for="ist120">a. </label>
				<!-- <center> -->
				<?php echo $tkp->opsi_a; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?> name="jawaban" value="B">
				<label class="form-check-label" for="ist120">b. </label>
				<!-- <center> -->
				<?php echo $tkp->opsi_b; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?> name="jawaban" value="C">
				<label class="form-check-label" for="ist120">c. </label>
				<!-- <center> -->
				<?php echo $tkp->opsi_c; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?> name="jawaban" value="D">
				<label class="form-check-label" for="ist120">d. </label>
				<!-- <center> -->
				<?php echo $tkp->opsi_d; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "E") { ?> checked="checked" <?php } ?> name="jawaban" value="E">
				<label class="form-check-label" for="ist120">e. </label>
				<!-- <center> -->
				<?php echo $tkp->opsi_e; ?>
				<!-- </center> -->
			</div>
			</div>
			</div>
			<center>
				<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
				<input type="hidden" name="id_ujian" value="1">
				<input type="hidden" name="nomor_soal" value="<?php echo $tkp->nomor_soal ?>">
				<div class="baten">
					<?php
					$jumlahsoal = $this->db->query("SELECT count(id_soal) as jumlah from tb_soal_tkp")->result();
					if ($tkp->nomor_soal != 1) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_tkp/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
						</button>
					<?php } ?>
					<!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_papi/0') ?>"> Konfirmasi -->
					</button>
					<?php if ($tkp->nomor_soal != intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_tkp/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
					<?php if ($tkp->nomor_soal >= intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_endtkp') ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
				</div>
			</center>

		</form>
	</div>
	<?php
	$this->load->view('pelamar/ujian/tkp/panel_ujian');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>