<?php $this->load->view('layout3/header') ?>
<div class="col-md-5 col-sm-12">
	<?php
	$id_ujian = $this->session->userdata('ses_tpa');
	$id_pelamar = $this->session->userdata('ses_id');
	$id_lowongan = $this->session->userdata('sesIdLowongan');
	$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
	$dbsoal = 'tb_soal_tpa';
	$dbjawaban = 'tb_data_jawaban_tpa';
	?>
	<h4><b>Daftar Soal</b></h4>
	<!-- 1 - 50 -->
	<?php
	if ($jenis_tpa != 'aktif') {
		$jumlahsoal = $this->db->query("SELECT count(id_soal_tpa) as jumlah from $dbsoal where seksi=2 and jenis_tpa='pendek'")->result();
	} else {
		$jumlahsoal = $this->db->query("SELECT count(id_soal_tpa) as jumlah from $dbsoal where seksi=2")->result();
	}
	for ($i = 1; $i <= intval($jumlahsoal[0]->jumlah); $i++) {
	?>
		<div class="col-sm-1 justify-content-center text-center" <?php
																	$query = $this->db->query("SELECT * FROM $dbjawaban WHERE id_lowongan = $id_lowongan AND nomor_soal = $i AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND seksi=2");
																	if ($query->num_rows() > 0) {
																		$warna = '#8ad919';
																		$warnaText = '#fff';
																	} else {
																		$warna = '#f1f1f1';
																		$warnaText = 'black';
																	} ?> style="background-color: <?php echo $warna ?>; margin: 5px; padding: 10px; border-radius: 5px">
			<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_tpa2/' . $id_ujian . '/' . $i) ?>" style="color: <?php echo $warnaText ?>"><b><?= $i; ?></b></a>
		</div>
	<?php } ?>
</div>

<?php $this->load->view('layout3/footer') ?>