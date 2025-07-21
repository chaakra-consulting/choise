<?php $this->load->view('layout3/header');
$dbsoal = 'tb_soal_tpa';
$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
?>
<div class="col-sm-12 box">
	<div class="col-sm-6">
		<h3><b>Soal Nomor <?php echo $array[0]->nomor_soal ?></b></h3>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<form method="post">
			<?php
			if ($array[0]->jenis_soal == 'Penalaran Keruangan' && $array[0]->type_soal_cerita == 'img') { ?>
				<img src="<?= base_url('upload/bank_soal/tpa/' . $array[0]->soal_cerita) ?>" class='img-responsive' alt=''>
			<?php } else {
				echo $array[0]->soal_cerita;
			}
			?>
			<br>
			<?php echo $array[0]->soal; ?>
			<br>
			<br>
			<?php if ($array[0]->jenis_soal == 'Penalaran Keruangan' && $array[0]->type_jawaban == 'img') { ?>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">a</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?> name="jawaban" value="A">
					<center>
						<img src="<?php echo ($array[0]->opsi_a != '' ? base_url('./upload/bank_soal/tpa/' . $array[0]->opsi_a) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">b</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?> name="jawaban" value="B">
					<center>
						<img src="<?php echo ($array[0]->opsi_b != '' ? base_url('./upload/bank_soal/tpa/' . $array[0]->opsi_b) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">c</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?> name="jawaban" value="C">
					<center>
						<img src="<?php echo ($array[0]->opsi_c != '' ? base_url('./upload/bank_soal/tpa/' . $array[0]->opsi_c) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">d</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?> name="jawaban" value="D">
					<center>
						<img src="<?php echo ($array[0]->opsi_d != '' ? base_url('./upload/bank_soal/tpa/' . $array[0]->opsi_d) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="cfit113">e</label>
					<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "E") { ?> checked="checked" <?php } ?> name="jawaban" value="E">
					<center>
						<img src="<?php echo ($array[0]->opsi_e != '' ? base_url('./upload/bank_soal/tpa/' . $array[0]->opsi_e) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: 100px; border-radius: 5px;">
					</center>
				</div>
				<br>
			<?php } else { ?>
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
			<?php } ?>
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
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_tpa3/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
						</button>
					<?php } ?>
					<!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_papi/0') ?>"> Konfirmasi -->
					</button>
					<?php if ($array[0]->nomor_soal != intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_tpa3/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
					<?php if ($array[0]->nomor_soal >= intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_endtpa3') ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
				</div>
			</center>
		</form>
	</div>
	<?php
	$this->load->view('pelamar/ujian/tpa/panel_ujian_3');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>