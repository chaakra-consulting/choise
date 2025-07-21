<?php $this->load->view('layout3/header') ?>
<div class="col-md-4 col-sm-12">
	<h4><b>Daftar Soal</b></h4>
	<?php
	$id_ujian = $this->session->userdata('ses_epps');
	$id_pelamar = $this->session->userdata('ses_id');
	$id_lowongan = $this->session->userdata('sesIdLowongan');
	$eppsjum = $this->db->query("SELECT COUNT(no_soal) AS jumlahsoal FROM tb_soal_epps")->result();
	for ($i = 1; $i <= $eppsjum[0]->jumlahsoal; $i++) {
	?>
		<!-- 1 - 225-->
		<div class="col-sm-1 justify-content-center text-center" <?php
																	$query = $this->db->query("SELECT * FROM tb_data_jawaban_epps WHERE no_soal = $i AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
																	if ($query->num_rows() > 0) {
																		$warna = '#8ad919';
																		$warnaText = '#fff';
																	} else {
																		$warna = '#f1f1f1';
																		$warnaText = 'black';
																	} ?> style="background-color: <?php echo $warna ?>; margin: 5px; padding: 10px; border-radius: 5px">
			<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_epps/' . $id_ujian . '/' . $i) ?>" style="color: <?php echo $warnaText ?>"><b><?= $i; ?></b></a>
		</div>
	<?php } ?>
</div>

<?php $this->load->view('layout3/footer') ?>