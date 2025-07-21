<?php $this->load->view('layout3/header');
$eppsjum = $this->db->query("SELECT COUNT(no_soal) AS jumlahsoal FROM tb_soal_epps")->result();
?>
<div class="col-sm-12 box">
	<br>
	<div class="col-sm-12">
		<h3><b>Soal Nomor <?php echo $epps->no_soal ?></b></h3>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-8 col-sm-12" style="margin-bottom: 5px;">
		<form method="post">
			<br><br>
			<!-- <div class="form-check col-lg-6 text-center" style="margin-top: 5px;"> -->
			<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "$epps->aspek1") { ?> checked="checked" <?php } ?> name="jawaban" value="<?php echo $epps->aspek1 ?>" id="jawaban" required="required"><br>
			<label class="form-check-label" for="jawaban">A. <?php echo $epps->pilihan1 ?></label>
			<br>
			<!-- </div> -->
			<!-- <div class="form-check col-lg-6 text-center" style="margin-top: 5px;"> -->
			<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "$epps->aspek2") { ?> checked="checked" <?php } ?> name="jawaban" value="<?php echo $epps->aspek2 ?>" id="jawaban2" required="required"><br>
			<label class="form-check-label" for="jawaban2">B. <?php echo $epps->pilihan2 ?></label>

			<!-- </div> -->
			<center>
				<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
				<!-- <input type="hidden" name="id_ujian" value="1"> -->
				<input type="hidden" name="id_ujian" value="<?= $this->session->userdata('ses_epps'); ?>">
				<input type="hidden" name="nomor_soal" value="<?php echo $epps->no_soal ?>">
				<div class="baten">
					<?php if ($epps->no_soal != 1) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_epps/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
						</button>
					<?php } ?>
					<!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_papi/0') ?>"> Konfirmasi -->
					</button>
					<?php if ($epps->no_soal != $eppsjum[0]->jumlahsoal) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_epps/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
					<?php if ($epps->no_soal >= $eppsjum[0]->jumlahsoal) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_endepps') ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
				</div>
			</center>

		</form>
	</div>
	<?php
	$this->load->view('pelamar/ujian/epps/panel_ujian');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>