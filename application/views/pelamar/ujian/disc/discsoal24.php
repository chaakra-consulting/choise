<?php $this->load->view('layout3/header') ?>

<div class="col-sm-12 box">

	<div class="col-sm-6">

		<h3><b>Soal Nomor <?php echo $disc->no_soal ?></b></h3>

		<hr color="black">

	</div>

	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">

		<form method="post">

			<div style="background-color: #f9243f; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">

				<h4 style="color: #fff;"><b>INSTRUKSI TES!</b></h4>

				<div style="background-color: #fff; padding-top: 5px; padding-bottom: 5px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">

					<li><strong>Pilihlah 1 pernyataan yang <u><i>PALING SESUAI</i></u> dengan diri Anda SAAT INI ( M )</strong></li>

					<li><strong>Pilihlah 1 pernyataan yang <u><i>PALING TIDAK SESUAI</i></u> dengan Anda SAAT INI ( L )</strong></li>

					<li><strong>Dalam 1 nomor akan ada 2 jawaban (1 jawaban pernyataan M & 1 Jawaban pernyataan L)</strong></li>

					<li><strong>Dalam satu nomor soal, tidak boleh ada jawaban yang sama untuk masing-masing kolom M dan L</strong></li>

				</div></br>

				<!-- <li style="color: #fff;">Pilihlah 1 pernyataan yang PALING tidak sesuai dengan Anda SAAT INI ( L )</li> -->

				<!-- <li style="color: #fff;">Sehingga dalam 1 soal akan ada 1 pernyataan M dan pernyataan L</li> -->

			</div><br>

			<label style="color:red">*Pastikan Tidak Ada 2 Jawaban pada kolom ( M / L ) yang sama , 2 Jawaban diwajibkan pada kolom ( M / L ) yang berbeda</label>

			<table class="table table-bordered">

				<thead>

					<tr>

						<th style="text-align: center;">M</th>

						<th style="text-align: center;">L</th>

						<th>Pernyataan</th>

					</tr>

				</thead>

				<tbody>

					<tr>

						<td style="text-align: center;">

							<!-- <input class="form-check-input" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A_M") { ?> checked="checked" <?php } ?> name="jawaban" value="A_M"></br> -->
							<input class="form-check-input" type="radio" <?php if (isset($jawaban2->jawaban) && $jawaban2->jawaban == $disc->aspek_m1) {
																				echo "checked";
																			} ?> name="jawaban1" value="<?php echo $disc->aspek_m1 ?>">

						</td>

						<td style="text-align: center;">

							<input class="form-check-input" type="radio" <?php if (isset($jawaban2->jawaban2) && $jawaban2->jawaban2 == $disc->aspek_l1) {
																				echo "checked";
																			} ?> name="jawaban2" value="<?php echo $disc->aspek_l1 ?>">

						</td>

						<td><?php echo $disc->pernyataan1 ?></td>

					</tr>

					<tr>

						<td style="text-align: center;">

							<input class="form-check-input" type="radio" <?php if (isset($jawaban2->jawaban) && $jawaban2->jawaban == $disc->aspek_m2) {
																				echo "checked";
																			} ?> name="jawaban1" value="<?php echo $disc->aspek_m2 ?>">

						</td>

						<td style="text-align: center;">

							<input class="form-check-input" type="radio" <?php if (isset($jawaban2->jawaban2) && $jawaban2->jawaban2 == $disc->aspek_l2) {
																				echo "checked";
																			} ?> name="jawaban2" value="<?php echo $disc->aspek_l2 ?>">

						</td>

						<td><?php echo $disc->pernyataan2 ?></td>

					</tr>

					<tr>

						<td style="text-align: center;">

							<input class="form-check-input" type="radio" <?php if (isset($jawaban2->jawaban) && $jawaban2->jawaban == $disc->aspek_m3) {
																				echo "checked";
																			} ?> name="jawaban1" value="<?php echo $disc->aspek_m3 ?>">

						</td>

						<td style="text-align: center;">

							<input class="form-check-input" type="radio" <?php if (isset($jawaban2->jawaban2) && $jawaban2->jawaban2 == $disc->aspek_l3) {
																				echo "checked";
																			} ?> name="jawaban2" value="<?php echo $disc->aspek_l3 ?>">

						</td>

						<td><?php echo $disc->pernyataan3 ?></td>

					</tr>

					<tr>

						<td style="text-align: center;">

							<input class="form-check-input" type="radio" <?php if (isset($jawaban2->jawaban) && $jawaban2->jawaban == $disc->aspek_m4) {
																				echo "checked";
																			} ?> name="jawaban1" value="<?php echo $disc->aspek_m4 ?>">

						</td>

						<td style="text-align: center;">

							<input class="form-check-input" type="radio" <?php if (isset($jawaban2->jawaban2) && $jawaban2->jawaban2 == $disc->aspek_l4) {
																				echo "checked";
																			} ?> name="jawaban2" value="<?php echo $disc->aspek_l4 ?>">

						</td>

						<td><?php echo $disc->pernyataan4 ?></td>

					</tr>

				</tbody>

			</table>

	</div>

	<?php

	$this->load->view('pelamar/ujian/disc/panel_ujian_disc');

	?>
	<center>

		<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">

		<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">

		<input type="hidden" name="id_ujian" value="1">

		<input type="hidden" name="nomor_soal" value="<?php echo $disc->no_soal ?>">

		<div class="baten">

			<?php if ($disc->no_soal != 1) { ?>

				<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_disc/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya

				</button>

			<?php } ?>

			</button>

			<?php if ($disc->no_soal != 24) { ?>

				<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_disc/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>

				</button>

			<?php } ?>

			<?php if ($disc->no_soal >= 24) { ?>

				<button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_enddisc') ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i>

				</button>

			<?php } ?>

		</div>

	</center>
	</form>

</div>

<?php

$this->load->view('layout3/footer') ?>