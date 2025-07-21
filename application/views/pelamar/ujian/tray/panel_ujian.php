<?php $this->load->view('layout3/header') ?>
<div class="col-md-3 col-sm-12">
	<?php
	$id_ujian = $this->session->userdata('ses_tray');
	$id_pelamar = $this->session->userdata('ses_id');
	$id_lowongan = $this->session->userdata('sesIdLowongan');
	?>
	<h4><b>Daftar Email</b></h4>
	
	<!-- 1 - 100 -->
	<?php
	$jumlahsoal = $this->db->query("SELECT count(id_soal) as jumlah from tb_soal_tray")->result();
	for ($i = 1; $i <= intval($jumlahsoal[0]->jumlah); $i++) {
	?>
		<div class="col-sm-2 justify-content-center text-center" <?php
																	$query = $this->db->query("SELECT * FROM tb_data_jawaban_tray WHERE id_lowongan = $id_lowongan AND no_soal = $i AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																	if ($query->num_rows() > 0) {
																		$warna = '#8ad919';
																		$warnaText = '#fff';
																	} else {
																		$warna = '#f1f1f1';
																		$warnaText = 'black';
																	} ?> style="background-color: <?php echo $warna ?>; margin: 5px; padding: 10px; border-radius: 5px">
			<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_tray/' . $id_ujian . '/' . $i) ?>" style="color: <?php echo $warnaText ?>"><b><?= $i; ?></b></a>
		</div>
	<?php } ?>
</div>
<?php $this->load->view('layout3/footer') ?>