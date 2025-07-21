<?php $this->load->view('layout3/header') ?>
<div class="col-md-5 col-sm-12">
	<?php
	$id_ujian = $this->session->userdata('ses_ujian');
	$id_pelamar = $this->session->userdata('ses_id');
	$id_lowongan = $this->session->userdata('sesIdLowongan');
	?>
	<h4><b>Daftar Soal</b></h4>
	<!-- 1 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 1 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>; margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '1') ?>" style="color: <?php echo $warnaText ?>"><b>1</b></a>
	</div>

	<!-- 2 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 2 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>; margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '2') ?>" style="color: <?php echo $warnaText ?>"><b>2</b></a>
	</div>

	<!-- 3 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 3 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '3') ?>" style="color: <?php echo $warnaText ?>"><b>3</b></a>
	</div>

	<!-- 4 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 4 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '4') ?>" style="color: <?php echo $warnaText ?>"><b>4</b></a>
	</div>

	<!-- 5 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 5 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																}
																?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">

		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '5') ?>" type="submit" style="background-color: $warna;color: <?php echo $warnaText ?>"><b>5</b></a>
	</div>

	<!-- 6 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 6 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '6') ?>" style="color: <?php echo $warnaText ?>"><b>6</b></a>
	</div>

	<!-- 7 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 7 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '7') ?>" style="color: <?php echo $warnaText ?>"><b>7</b></a>
	</div>

	<!-- 8 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 8 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '8') ?>" style="color: <?php echo $warnaText ?>"><b>8</b></a>
	</div>

	<!-- 9 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 9 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '9') ?>" style="color: <?php echo $warnaText ?>"><b>9</b></a>
	</div>

	<!-- 10 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 10 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '10') ?>" style="color: <?php echo $warnaText ?>"><b>10</b></a>
	</div>

	<!-- 11 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 11 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '11') ?>" style="color: <?php echo $warnaText ?>"><b>11</b></a>
	</div>

	<!-- 12 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 12 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '12') ?>" style="color: <?php echo $warnaText ?>"><b>12</b></a>
	</div>

	<!-- 13 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 13 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '13') ?>" style="color: <?php echo $warnaText ?>"><b>13</b></a>
	</div>


	<!-- 14 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 14 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '14') ?>" style="color: <?php echo $warnaText ?>"><b>14</b></a>
	</div>


	<!-- 15 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 15 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '15') ?>" style="color: <?php echo $warnaText ?>"><b>15</b></a>
	</div>

	<!-- 16 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 16 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '16') ?>" style="color: <?php echo $warnaText ?>"><b>16</b></a>
	</div>

	<!-- 17 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 17 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '17') ?>" style="color: <?php echo $warnaText ?>"><b>17</b></a>
	</div>

	<!-- 18 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 18 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '18') ?>" style="color: <?php echo $warnaText ?>"><b>18</b></a>
	</div>

	<!-- 19 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 19 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '19') ?>" style="color: <?php echo $warnaText ?>"><b>19</b></a>
	</div>

	<!-- 20 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 20 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '20') ?>" style="color: <?php echo $warnaText ?>"><b>20</b></a>
	</div>



	<!-- 21 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 21 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '21') ?>" style="color: <?php echo $warnaText ?>"><b>21</b></a>
	</div>

	<!-- 22 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 22 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '22') ?>" style="color: <?php echo $warnaText ?>"><b>22</b></a>
	</div>

	<!-- 23 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 23 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '23') ?>" style="color: <?php echo $warnaText ?>"><b>23</b></a>
	</div>

	<!-- 24 -->
	<div class="col-sm-2 justify-content-center text-center" <?php
																$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan=$id_lowongan AND no_soal = 24 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");
																if ($query->num_rows() > 0) {
																	$warna = '#8ad919';
																	$warnaText = '#fff';
																} else {
																	$warna = '#f1f1f1';
																	$warnaText = 'black';
																} ?> style="background-color: <?php echo $warna ?>;  margin: 5px; padding: 10px; border-radius: 5px">
		<a href="<?php echo base_url('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . '24') ?>" style="color: <?php echo $warnaText ?>"><b>24</b></a>
	</div>



</div>

<?php $this->load->view('layout3/footer') ?>