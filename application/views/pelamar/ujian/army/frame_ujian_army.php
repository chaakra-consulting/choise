<?php $this->load->view('layout3/header') ?>
<style>
    .custom-radio {
        width: 16px; /* Ubah sesuai kebutuhan */
        height: 15px; /* Ubah sesuai kebutuhan */
    }
    <?php
               if ($army->nomor_soal == 9 || $army->nomor_soal == 2 || $army->nomor_soal == 7 || $army->nomor_soal == 8 || $army->nomor_soal == 10 || $army->nomor_soal == 11 || $army->nomor_soal == 12) {
                $imageWidth = 400;
                } elseif ($army->nomor_soal == 3) {
                $imageWidth = 100;
                }
                elseif ($army->nomor_soal == 4) {
                    $imageWidth = 100;
                }else {
                $imageWidth = 200;
                }
                ?>
    <?php
               if ($army->nomor_soal == 3) {
                $no = 200;
                } elseif ($army->nomor_soal == 4) {
                $no = 200;
                }
                elseif ($army->nomor_soal == 1 || $army->nomor_soal == 5 || $army->nomor_soal == 6) {
                $no = 300;
                }else {
                $no = 500;
                }
                ?>
  
</style>
<div class="col-sm-12 box">
	<div class="col-sm-12">
		
		<h3><b>Soal Nomor <?php echo $army->nomor_soal ?></b></h3>
		<!-- <p id="time"></p> -->
		<hr color="black">
	</div>
	<div class="col-md-9 col-sm-12" style="margin-bottom: 10px;">
		<div class="col-sm-12">
			<form method="post">
			<h4><b>Intruksi : </b><?php echo $army->intruksi ?></h4>
            <br>
            <h4>Dari intruksi diatas, pilihlah jawaban yang menurut anda benar.</h4>
            <br>
				<center><img src="<?php echo ($army->soal != '' ? base_url('./upload/bank_soal/army/' . $army->soal) : base_url('./upload/bank_soal/img_default.jpg')); ?>" class="img-responsive" alt="" style="width: <?php echo $no; ?>px; margin: 10px; border-radius: 5px; border-radius: 5px"></center>
				<br>
				
				<div class="form-check col-sm-12" style="margin-top: 5px;">
					<label class="form-check-label" for="army113" style="font-size:18px;">a.</label>
					<input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "A") { ?> checked="checked" <?php } ?> name="jawaban" value="A">
						

                <img src="<?php echo ($army->opsi_a != '' ? base_url('./upload/bank_soal/army/' . $army->opsi_a) : base_url('./upload/bank_soal/img_default.jpg')); ?>" alt="" style="width: <?php echo $imageWidth; ?>px;">

					
				</div>
				
				<div class="form-check col-sm-12 " style="margin-top: 5px;">
					<label class="form-check-label" for="army113" style="font-size:18px;">b.</label>
					<input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "B") { ?> checked="checked" <?php } ?> name="jawaban" value="B">
					
						<img src="<?php echo ($army->opsi_b != '' ? base_url('./upload/bank_soal/army/' . $army->opsi_b) : base_url('./upload/bank_soal/img_default.jpg')); ?>"  alt="" style="width: <?php echo $imageWidth; ?>px;">
					
				</div>
					<div class="form-check col-sm-12" style="margin-top: 5px;">
					<label class="form-check-label" for="army113" style="font-size:18px;">c.</label>
					<input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "C") { ?> checked="checked" <?php } ?> name="jawaban" value="C">
					
						<img src="<?php echo ($army->opsi_c != '' ? base_url('./upload/bank_soal/army/' . $army->opsi_c) : base_url('./upload/bank_soal/img_default.jpg')); ?>"  alt="" style="width: <?php echo $imageWidth; ?>px;">
					
				</div>
				
				<div class="form-check col-sm-12" style="margin-top: 5px;">
					<label class="form-check-label" for="army113" style="font-size:18px;">d.</label>
					<input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "D") { ?> checked="checked" <?php } ?> name="jawaban" value="D">
					
						<img src="<?php echo ($army->opsi_d != '' ? base_url('./upload/bank_soal/army/' . $army->opsi_d) : base_url('./upload/bank_soal/img_default.jpg')); ?>"  alt="" style="width: <?php echo $imageWidth; ?>px;">
					
				</div>
				
				<div class="form-check col-sm-12" style="margin-top: 5px;">
					<label class="form-check-label" for="army113" style="font-size:18px;">e.</label>
					<input class="form-check-input custom-radio" type="radio" <?php if (!empty($jawaban->jawaban) && $jawaban->jawaban == "E") { ?> checked="checked" <?php } ?> name="jawaban" value="E">
					
						<img src="<?php echo ($army->opsi_e != '' ? base_url('./upload/bank_soal/army/' . $army->opsi_e) : base_url('./upload/bank_soal/img_default.jpg')); ?>"alt="" style="width: <?php echo $imageWidth; ?>px;">
					
				</div>
		</div>
			<center>
				<input type="hidden" name="id_pelamar" value="<?php echo $this->session->userdata('ses_id') ?>">
				<input type="hidden" name="id_lowongan" value="<?php echo $this->session->userdata('sesIdLowongan') ?>">
				<input type="hidden" name="id_ujian" value="1">
				<input type="hidden" name="nomor_soal" value="<?php echo $army->nomor_soal ?>">
				<div class="baten">
					<?php
					$jumlahsoal = $this->db->query("SELECT count(id_soal) as jumlah from tb_soal_army")->result();
					if ($army->nomor_soal != 1) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_army/1') ?>"> <i class="fa fa-arrow-circle-left"> </i> Sebelumnya
						</button>
					<?php } ?>
					<!-- <button type="submit" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_papi/0') ?>"> Konfirmasi -->
					</button>
					<?php if ($army->nomor_soal != intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-primary" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_army/2') ?>"> Selanjutnya <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
					<?php if ($army->nomor_soal >= intval($jumlahsoal[0]->jumlah)) { ?>
						<button type="submit" style="margin-top: 5%" class="btn btn-danger" formaction="<?php echo base_url('Pelamar/Ujian/masukkan_jawaban_endarmy') ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengakhiri ujian?');"> Selesai <i class="fa fa-arrow-circle-right"></i>
						</button>
					<?php } ?>
				</div>
			</center>

		</form>
	</div>
	<?php
	$this->load->view('pelamar/ujian/army/panel_ujian');
	?>

</div>

<?php

$this->load->view('layout3/footer') ?>