<?php $this->load->view('layout3/header') ?>
<div class="col-sm-12 box">
	<div class="col-sm-6">
		<h3><b>Soal Nomor <?php echo $inggris->nomor_soal ?></b></h3>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<form method="post">
			<div style="width: 600px; margin: 10px; border-radius: 5px; border-radius: 5px">
				<?php echo $inggris->keterangan_soal; ?>
			</div>
			<br>
			<div style="width: 600px; margin: 10px; border-radius: 5px; border-radius: 5px">
				<?php echo $inggris->soal; ?>
			</div>
			<br>
			<!--<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">-->
			<!--	<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?> name="jawaban" value="A">-->
			<!--	<label class="form-check-label" for="ist120">a. </label>-->
				<!-- <center> -->
			<!--	<?php echo $inggris->opsi_a; ?>-->
				<!-- </center> -->
			<!--</div>-->
			<!--<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">-->
			<!--	<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?> name="jawaban" value="B">-->
			<!--	<label class="form-check-label" for="ist120">b. </label>-->
				<!-- <center> -->
			<!--	<?php echo $inggris->opsi_b; ?>-->
				<!-- </center> -->
			<!--</div>-->
			<!--<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">-->
			<!--	<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?> name="jawaban" value="C">-->
			<!--	<label class="form-check-label" for="ist120">c. </label>-->
				<!-- <center> -->
			<!--	<?php echo $inggris->opsi_c; ?>-->
				<!-- </center> -->
			<!--</div>-->
			<!--<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">-->
			<!--	<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?> name="jawaban" value="D">-->
			<!--	<label class="form-check-label" for="ist120">d. </label>-->
				<!-- <center> -->
			<!--	<?php echo $inggris->opsi_d; ?>-->
				<!-- </center> -->
			<!--</div>-->
			
			<style>
				.form-check-input {
					vertical-align: middle;
					margin-right: 10px;
				}
				.form-check-label {
					vertical-align: middle;
				}
				.form-check {
					margin-top: 10px;
				}
			</style>

			<div class="form-check">
				<label class="form-check-label" for="opsiA">
					<input class="form-check-input" type="radio" name="jawaban" value="A" id="opsiA"
						<?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") echo 'checked'; ?>>
					a. <?php echo $inggris->opsi_a; ?>
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label" for="opsiB">
					<input class="form-check-input" type="radio" name="jawaban" value="B" id="opsiB"
						<?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") echo 'checked'; ?>>
					b. <?php echo $inggris->opsi_b; ?>
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label" for="opsiC">
					<input class="form-check-input" type="radio" name="jawaban" value="C" id="opsiC"
						<?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") echo 'checked'; ?>>
					c. <?php echo $inggris->opsi_c; ?>
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label" for="opsiD">
					<input class="form-check-input" type="radio" name="jawaban" value="D" id="opsiD"
						<?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") echo 'checked'; ?>>
					d. <?php echo $inggris->opsi_d; ?>
				</label>
			</div>
			<center>
				<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
				<input type="hidden" name="id_ujian" value="1">
				<input type="hidden" name="nomor_soal" value="<?php echo $inggris->nomor_soal ?>">
				<div class="baten">
					<?php
					$jumlahsoal = $this->db->query("SELECT count(id_soal) as jumlah from tb_soal_inggris")->result();
					if ($inggris->nomor_soal != 1) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_inggris/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
						</button>
					<?php } ?>
					<!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_papi/0') ?>"> Konfirmasi -->
					</button>
					<?php if ($inggris->nomor_soal != intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_inggris/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
					<?php if ($inggris->nomor_soal >= intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_endinggris') ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
				</div>
			</center>

		</form>
	</div>
	<?php
	$this->load->view('pelamar/ujian/inggris/panel_ujian');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>