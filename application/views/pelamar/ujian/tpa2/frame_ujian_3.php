<?php $this->load->view('layout3/header');
$dbsoal = 'tb_soal_tpa2';
$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
?>
<div class="col-sm-12 box">
<h3 class="text-center"><b>Subtes : <?php echo $array[0]->jenis_soal; ?></b></h3>
	<div class="col-sm-6">
		<h3><b>Soal Nomor <?php echo $array[0]->nomor_soal ?></b></h3>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<form method="post">
			<b><?php echo $array[0]->soal; ?></b>
			<br>
			<br>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?> name="jawaban" value="A">
				<label class="form-check-label" for="ist120">a. </label>
				<!-- <center> -->
				<?php echo $array[0]->opsi_a; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?> name="jawaban" value="B">
				<label class="form-check-label" for="ist120">b. </label>
				<!-- <center> -->
				<?php echo $array[0]->opsi_b; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?> name="jawaban" value="C">
				<label class="form-check-label" for="ist120">c. </label>
				<!-- <center> -->
				<?php echo $array[0]->opsi_c; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?> name="jawaban" value="D">
				<label class="form-check-label" for="ist120">d. </label>
				<!-- <center> -->
				<?php echo $array[0]->opsi_d; ?>
				<!-- </center> -->
			</div>
			<div class="form-check" style="margin-top: 5px;">
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "E") { ?> checked="checked" <?php } ?> name="jawaban" value="E">
				<label class="form-check-label" for="ist120">e. </label>
				<!-- <center> -->
				<?php echo $array[0]->opsi_e; ?>
				<!-- </center> -->
			</div>
			<center>
				<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
				<input type="hidden" name="id_ujian" value="1">
				<input type="hidden" name="nomor_soal" value="<?php echo $array[0]->nomor_soal ?>">
				<input type="hidden" name="seksi" value="<?php echo $array[0]->seksi ?>">
				<input type="hidden" name="jenis_soal" value="<?php echo $array[0]->jenis_soal ?>">
				<input type="hidden" name="jenis_tpa" value="<?php echo $array[0]->jenis_tpa ?>">
				<div class="baten">
					<?php
					if ($jenis_tpa != 'aktif') {
						$jumlahsoal = $this->db->query("SELECT count(id_soal_tpa) as jumlah from $dbsoal where seksi=3 and jenis_tpa='pendek'")->result();
					} else {
						$jumlahsoal = $this->db->query("SELECT count(id_soal_tpa) as jumlah from $dbsoal where seksi=3")->result();
					}
					if ($array[0]->nomor_soal != 1) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_tpa2_3/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
						</button>
					<?php } ?>
					<!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_papi/0') ?>"> Konfirmasi -->
					</button>
					<?php if ($array[0]->nomor_soal != intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_tpa2_3/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
					<?php if ($array[0]->nomor_soal >= intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_endtpa2_3') ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
				</div>
			</center>
		</form>
	</div>
	<?php
	$this->load->view('pelamar/ujian/tpa2/panel_ujian_3');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>