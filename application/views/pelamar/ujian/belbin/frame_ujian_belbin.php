<?php   $this->load->view('layout3/header') ?>
<div class="col-sm-12 box">
	<div class="col-sm-6">
		<h3><b>Apa yang Saya Percaya Dapat Saya Kontribusikan untuk Tim:</b></h3>
		<h3><b> Nomor <?php echo $soal_subtes1->nomor_soal; ?></b></h3>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
		<div class="col-sm-12">
			<form method="post">
	
				
			<div style="width: 600px; margin: 10px; border-radius: 5px; border-radius: 5px">
				<?php echo $soal_subtes1->soal; ?>
			</div>

				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
						<input class="form-check-input" type="radio" <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "00"){?> checked="checked" <?php } ?> name="jawaban" value="00">
					<center>
					<?php echo $soal_subtes1->opsi_a; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "1"){?> checked="checked" <?php } ?> name="jawaban" value="1">
					<center>
					<?php echo $soal_subtes1->opsi_b; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "2"){?> checked="checked" <?php } ?> name="jawaban" value="2">
					<center>
					<?php echo $soal_subtes1->opsi_c; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "3"){?> checked="checked" <?php } ?> name="jawaban" value="3">
					<center>
					<?php echo $soal_subtes1->opsi_d; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "4"){?> checked="checked" <?php } ?> name="jawaban" value="4">
					<center>
					<?php echo $soal_subtes1->opsi_e; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "5"){?> checked="checked" <?php } ?> name="jawaban" value="5">
					<center>
					<?php echo $soal_subtes1->opsi_f; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "6"){?> checked="checked" <?php } ?> name="jawaban" value="6">
					<center>
					<?php echo $soal_subtes1->opsi_g; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "7"){?> checked="checked" <?php } ?> name="jawaban" value="7">
					<center>
					<?php echo $soal_subtes1->opsi_h; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "8"){?> checked="checked" <?php } ?> name="jawaban" value="8">
					<center>
					<?php echo $soal_subtes1->opsi_i; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "9"){?> checked="checked" <?php } ?> name="jawaban" value="9">
					<center>
					<?php echo $soal_subtes1->opsi_j; ?>
					</center>
				</div>
				<div class="form-check col-sm-2 text-center" style="margin-top: 5px;">
					<label class="form-check-label" for="belbin120"></label>
					<input class="form-check-input" type="radio"  <?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== "10"){?> checked="checked" <?php } ?> name="jawaban" value="10">
					<center>
					<?php echo $soal_subtes1->opsi_k; ?>
					</center>
				</div>
			
			</div>
			<center>


				<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
				<input type="hidden" name="id_ujian" value="<?php echo $this->session->userdata('ses_ujian') ?>">
				<input type="hidden" name="nomor_soal" value="<?php echo $soal_subtes1->nomor_soal ?>">
				<input type="hidden" name="subtes" value="<?php echo $soal_subtes1->subtes ?>">
				<div class="baten">
					<?php if ($soal_subtes1->nomor_soal != 1 && $soal_subtes1->subtes == 1) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_belbin/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
						</button>
					<?php } ?>
					<!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_belbin/0') ?>"> Konfirmasi -->
					</button>
					<?php if($soal_subtes1->nomor_soal != 9 && $soal_subtes1->subtes == 1){ ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_belbin/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
					<?php if($soal_subtes1->nomor_soal >= 9 && $soal_subtes1->subtes == 1){ ?>
					<?php } ?>
				</div>
			</center>

		</form>
	</div>
	<?php 
	$this->load->view('panel_ujian_belbin');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>