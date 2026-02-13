<?php $this->load->view('layout3/header') ?>

<div class="col-sm-12 box">

	<div class="col-sm-6">

		<h3><b>Soal Nomor <?php echo $sk_mesin->no_soal ?></b></h3>

		<!-- <p id="time"></p> -->


		<hr color="black">

	</div>

	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<h4><?php echo $sk_mesin->soal ?></h4>
		<form method="post">



			<label for="jawaban">Tulis Jawaban:</label>
			<textarea name="jawaban" id="jawaban" class="form-control"><?= $jawaban->jawaban ?? "" ?></textarea>
			<center>





				<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">

				<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">

				<input type="hidden" name="id_ujian" value="1">

				<input type="hidden" name="nomor_soal" value="<?php echo $sk_mesin->no_soal ?>">


				<div class="baten">

					<?php if ($sk_mesin->no_soal != 1) { ?>

						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_sk_mekanik_mesin/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya

						</button>

					<?php } ?>

					</button>

					<?php if ($sk_mesin->no_soal != 6) { ?>

						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_sk_mekanik_mesin/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>

						</button>

					<?php } ?>

					<?php if ($sk_mesin->no_soal >= 6) { ?>

						<button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_endsk_mekanik_mesin') ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i>

						</button>

					<?php } ?>

				</div>

			</center>

		</form>

	</div>

	<?php

	$this->load->view('pelamar/ujian/studi_kasus/mekanik_mesin/panel_ujian');

	?>



</div>



<?php



$this->load->view('layout3/footer') ?>