<?php $this->load->view('layout3/header') ?>
<style>
    /* Mengatur ukuran teks untuk nomor soal dan soal */
    .question-number, .question-text {
        font-size: 20px; /* Sesuaikan ukuran sesuai kebutuhan */
		color: #000000;
		font-weight: bold;
    }

    /* Mengatur ukuran teks untuk opsi jawaban A, B, C, D, dan E */
    .answer-option {
        font-size: 16px; /* Sesuaikan ukuran sesuai kebutuhan */
		color: #000000;
		text-align: middle; 
	
    }
	.form-check.col-sm-2.text-center input[type="radio"] {
    transform: scale(1.5); /* Anda dapat mengganti nilai 1.5 dengan nilai lain sesuai dengan kebutuhan Anda */
	margin-top: -5px;
	}
	.form-check-input,
	.answer-option {
    display: inline-block; /* or 'inline' */
    vertical-align: middle; /* To align them vertically */
	
	}
	.form-check {
    display: flex;
	
    align-items: center; /* Aligns items vertically in the center */
	}		
	.form-check {
    display: grid;
    grid-template-columns: auto auto; /* Two columns: one for text and one for the button */
    align-items: center;
}
.underlined-text {
            text-decoration: underline;
            line-height: 1.5; /* Anda dapat mengatur nilai sesuai dengan kebutuhan untuk menggeser garis bawah */
        }
</style>
<div class="col-sm-12 box">
	<div class="col-sm-6">
		<h3><b class="question-number">Soal Nomor <?php echo $cepat->nomor_soal ?></b></h3>
		
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 10px;">
		<form method="post">
			<div style="width: 600px; margin: 10px; border-radius: 5px; border-radius: 5px ">
			<p class="question-text"><?php echo $cepat->soal; ?></p>
			</div>
			<br>
			<div class="form-check col-sm-2 text-center" style="margin-top:6px;">
			<p class="answer-option"><?php echo $cepat->opsi_a; ?></p>
			<input class="form-check-input" type="radio" name="jawaban" value="A" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?>>
			<label class="form-check-label" for="ist120"></label>
			</div>
			<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
				<p class="answer-option"><?php echo $cepat->opsi_b; ?></p>
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?> name="jawaban" value="B">
				<label class="form-check-label" for="ist120"></label>
				<!-- <center> -->
				
				<!-- </center> -->
			</div>
			<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
				<p class="answer-option"><?php echo $cepat->opsi_c; ?></p>
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?> name="jawaban" value="C">
				<label class="form-check-label" for="ist120"></label>
				<!-- <center> -->
				
				<!-- </center> -->
			</div>
			<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
				<p class="answer-option"><?php echo $cepat->opsi_d; ?></p>
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?> name="jawaban" value="D">
				<label class="form-check-label" for="ist120"></label>
				<!-- <center> -->
				
				<!-- </center> -->
			</div>
			<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
				<p class="answer-option"><?php echo $cepat->opsi_e; ?></p>
				<input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "E") { ?> checked="checked" <?php } ?> name="jawaban" value="E">
				<label class="form-check-label" for="ist120"></label>
				<!-- <center> -->
				
				<!-- </center> -->
			</div>
			<center>
				<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
				<input type="hidden" name="id_ujian" value="1">
				<input type="hidden" name="nomor_soal" value="<?php echo $cepat->nomor_soal ?>">
				<div class="baten">
					<?php
					$jumlahsoal = $this->db->query("SELECT count(id_soal) as jumlah from tb_soal_cepat")->result();
					if ($cepat->nomor_soal != 1) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_cepat/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
						</button>
					<?php } ?>
					<!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_papi/0') ?>"> Konfirmasi -->
					</button>
					<?php if ($cepat->nomor_soal != intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_cepat/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
					<?php if ($cepat->nomor_soal >= intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_endcepat') ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
				</div>
			</center>

		</form>
	</div>
	<?php
	$this->load->view('pelamar/ujian/cepat/panel_ujian');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>