<?php $this->load->view('layout3/header2') ?>

<?php $this->load->view('layout3/navbar') ?>



<?php

$id_pelamar = $this->session->userdata('ses_id');

$idkontrakpsikologis = $this->session->userdata('ses_ujiankontrakpsikologis');

$idLowongan = $this->session->userdata('sesIdLowongan');



$kontrakpsikologis = $this->db->query("SELECT * FROM tb_ujian_kontrak_psikologis WHERE id_ujian_kontrak_psikologis = $idkontrakpsikologis");

foreach ($kontrakpsikologis->result() as $key_ukontrakpsikologis) {

	$timekontrakpsikologis = $key_ukontrakpsikologis->waktu_akhir;
}

?>



<div class="col-sm-12 main">

	<div class="row" style="margin-bottom: -50px;">

		<div class="col-lg-9">

			<h3 class="page-header" style="margin-top: 15px">Kontrak Psikologis</h3>

		</div>

		<div class="col-lg-3">

			<h4 style="margin-top: 35px" align="right">Waktu pengerjaan <span id="time"></span> detik</h4>

		</div>

	</div>
	<!--/.row-->

	<div class="col-sm-12" style="background-color: #f9243f; padding: 30px; border-radius: 5px; margin-bottom: 20px;">

		<h4 style="color: #fff;"><b>Petunjuk Pengisian</b></h4>

		<p style="color: #fff">ANDA AKAN DIHADAPKAN PADA SEJUMLAH PENYATAAN PADA MASING-MASING ASPEK YANG DINILAI.</p>

		<p style="color: #fff">TUGAS ANDA ADALAH MEMILIH ANGKA (SKALA 1-7) YANG PALING MENCERMINKAN DIRI ANDA SAAT INI SESUAI DENGAN ASPEK YANG DINILAI.</p>
		<p style="color: #fff">KETERANGAN :</p>
		<ol style="color: #fff">
			<li>Tidak Ada</li>
			<li>Sangat Rendah</li>
			<li>Rendah</li>
			<li>Cukup</li>
			<li>Tinggi</li>
			<li>Sangat Tinggi</li>
			<li>Sempurna</li>
		</ol>
	</div>

	<label style="color:red">*Mohon menunggu hingga waktu berakhir, agar jawaban dapat terekam dengan baik !</label></br>

	<div class="col-sm-12" style="background-color: #fff; padding: 30px; border-radius: 5px;">

		<div class="table-responsive">

			<!-- <form action="<?php echo base_url("Pelamar/Ujian/jawaban_holland/") ?>" method="post"> -->

			<table class="table table-bordered">

				<tr>

					<th style="text-align: center; background-color: grey; color: #fff" colspan="3">INDIVIDUAL</th>

					<!-- <th style="background-color: grey; color: #fff">R =</th> -->

				</tr>

				<tr>

					<th width="150"><u>Apa yang saya inginkan</u> untuk karir saya di masa depan?</th>

					<th width="150" class="text-center">EXPECTATION</th>

					<th width="150"><u>Sejauh apa yg bisa saya harapkan</u> dari perusahaan saya untuk saat ini?</th>

				</tr>
				<?php
				$no_1 = 1;
				$soal_1 = $this->db->query("SELECT * FROM tb_soal_kontrak_psikologis WHERE `no` <= 24 ORDER BY `no` ASC")->result();
				foreach ($soal_1 as $key_1) {
				?>
					<tr>
						<td>
							<?php
							$cek = $this->db->query("SELECT * FROM tb_data_jawaban_kontrak_psikologis WHERE no='$no_1' AND id_lowongan='$idLowongan' AND id_pelamar='$id_pelamar'")->result();
							?>
							<input class="form-check-input" id='jawaban<?= $no_1 ?>' name='jawaban<?= $no_1 ?>' type="radio" onclick="k_<?= $no_1 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '1' ? 'checked' : '' : '' ?> value="1"> 1
							<input class="form-check-input" id='jawaban<?= $no_1 ?>' name='jawaban<?= $no_1 ?>' type="radio" onclick="k_<?= $no_1 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '2' ? 'checked' : '' : '' ?> value="2"> 2
							<input class="form-check-input" id='jawaban<?= $no_1 ?>' name='jawaban<?= $no_1 ?>' type="radio" onclick="k_<?= $no_1 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '3' ? 'checked' : '' : '' ?> value="3"> 3
							<input class="form-check-input" id='jawaban<?= $no_1 ?>' name='jawaban<?= $no_1 ?>' type="radio" onclick="k_<?= $no_1 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '4' ? 'checked' : '' : '' ?> value="4"> 4
							<input class="form-check-input" id='jawaban<?= $no_1 ?>' name='jawaban<?= $no_1 ?>' type="radio" onclick="k_<?= $no_1 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '5' ? 'checked' : '' : '' ?> value="5"> 5
							<input class="form-check-input" id='jawaban<?= $no_1 ?>' name='jawaban<?= $no_1 ?>' type="radio" onclick="k_<?= $no_1 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '6' ? 'checked' : '' : '' ?> value="6"> 6
							<input class="form-check-input" id='jawaban<?= $no_1 ?>' name='jawaban<?= $no_1 ?>' type="radio" onclick="k_<?= $no_1 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '7' ? 'checked' : '' : '' ?> value="7"> 7
							<script type="text/javascript">
								function k_<?= $no_1 ?>(radio) {
									var name = parseInt(radio.value);
									var no = <?= $no_1 ?>;
									$.ajax({
										url: "<?php echo base_url('Pelamar/Ujian/save_kontrak_psikologis'); ?>",
										data: {
											name: name,
											no: no,
										},
										type: "post",
										async: true,
										dataType: 'json'
									});
								}
							</script>
						</td>

						<td><?= $key_1->soal ?></td>

						<td><?php
							$cek = $this->db->query("SELECT * FROM tb_data_jawaban_kontrak_psikologis WHERE no='" . ($no_1 + 24) . "' AND id_lowongan='$idLowongan' AND id_pelamar='$id_pelamar'")->result();
							?>
							<input class="form-check-input" id='jawaban<?= ($no_1 + 24) ?>' name="jawaban<?= ($no_1 + 24) ?>" type="radio" onclick="k_<?= ($no_1 + 24) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '1' ? 'checked' : '' : '' ?> value="1"> 1
							<input class="form-check-input" id='jawaban<?= ($no_1 + 24) ?>' name="jawaban<?= ($no_1 + 24) ?>" type="radio" onclick="k_<?= ($no_1 + 24) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '2' ? 'checked' : '' : '' ?> value="2"> 2
							<input class="form-check-input" id='jawaban<?= ($no_1 + 24) ?>' name="jawaban<?= ($no_1 + 24) ?>" type="radio" onclick="k_<?= ($no_1 + 24) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '3' ? 'checked' : '' : '' ?> value="3"> 3
							<input class="form-check-input" id='jawaban<?= ($no_1 + 24) ?>' name="jawaban<?= ($no_1 + 24) ?>" type="radio" onclick="k_<?= ($no_1 + 24) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '4' ? 'checked' : '' : '' ?> value="4"> 4
							<input class="form-check-input" id='jawaban<?= ($no_1 + 24) ?>' name="jawaban<?= ($no_1 + 24) ?>" type="radio" onclick="k_<?= ($no_1 + 24) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '5' ? 'checked' : '' : '' ?> value="5"> 5
							<input class="form-check-input" id='jawaban<?= ($no_1 + 24) ?>' name="jawaban<?= ($no_1 + 24) ?>" type="radio" onclick="k_<?= ($no_1 + 24) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '6' ? 'checked' : '' : '' ?> value="6"> 6
							<input class="form-check-input" id='jawaban<?= ($no_1 + 24) ?>' name="jawaban<?= ($no_1 + 24) ?>" type="radio" onclick="k_<?= ($no_1 + 24) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '7' ? 'checked' : '' : '' ?> value="7"> 7
							<script type="text/javascript">
								function k_<?= ($no_1 + 24) ?>(radio) {
									var name = parseInt(radio.value);
									var no = <?= ($no_1 + 24) ?>;
									$.ajax({
										url: "<?php echo base_url('Pelamar/Ujian/save_kontrak_psikologis'); ?>",
										data: {
											name: name,
											no: no,
										},
										type: "post",
										async: true,
										dataType: 'json',
									});
								}
							</script>
						</td>

					</tr>
				<?php $no_1++;
				} ?>
			</table>



			<table class="table table-bordered">

				<tr>

					<th style="text-align: center; background-color: grey; color: #fff" colspan="3">ORGANISASI</th>

					<!-- <th style="background-color: grey; color: #fff">R =</th> -->

				</tr>

				<tr>

					<th width="150"><u>Sejauh Mana Harapan</u> Perusahaan atas Kinerja Saya saat ini?</th>

					<th width="150" class="text-center">ASPEK YANG DINILAI</th>

					<th width="150">Sebenarnya <u>Sejauh Apa Performasi</u> yg bisa saya berikan pada Perusahaan saat ini?</th>

				</tr>
				<?php
				$no_2 = 49;
				$soal_2 = $this->db->query("SELECT * FROM tb_soal_kontrak_psikologis WHERE `no` >= 49 ORDER BY `no` ASC")->result();
				foreach ($soal_2 as $key_2) {
				?>
					<tr>
						<td>
							<?php
							$cek = $this->db->query("SELECT * FROM tb_data_jawaban_kontrak_psikologis WHERE no='$no_2' AND id_lowongan='$idLowongan' AND id_pelamar='$id_pelamar'")->result();
							?>
							<input class="form-check-input" id='jawaban<?= $no_2 ?>' name='jawaban<?= $no_2 ?>' type="radio" onclick="k_<?= $no_2 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '1' ? 'checked' : '' : '' ?> value="1"> 1
							<input class="form-check-input" id='jawaban<?= $no_2 ?>' name='jawaban<?= $no_2 ?>' type="radio" onclick="k_<?= $no_2 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '2' ? 'checked' : '' : '' ?> value="2"> 2
							<input class="form-check-input" id='jawaban<?= $no_2 ?>' name='jawaban<?= $no_2 ?>' type="radio" onclick="k_<?= $no_2 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '3' ? 'checked' : '' : '' ?> value="3"> 3
							<input class="form-check-input" id='jawaban<?= $no_2 ?>' name='jawaban<?= $no_2 ?>' type="radio" onclick="k_<?= $no_2 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '4' ? 'checked' : '' : '' ?> value="4"> 4
							<input class="form-check-input" id='jawaban<?= $no_2 ?>' name='jawaban<?= $no_2 ?>' type="radio" onclick="k_<?= $no_2 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '5' ? 'checked' : '' : '' ?> value="5"> 5
							<input class="form-check-input" id='jawaban<?= $no_2 ?>' name='jawaban<?= $no_2 ?>' type="radio" onclick="k_<?= $no_2 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '6' ? 'checked' : '' : '' ?> value="6"> 6
							<input class="form-check-input" id='jawaban<?= $no_2 ?>' name='jawaban<?= $no_2 ?>' type="radio" onclick="k_<?= $no_2 ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '7' ? 'checked' : '' : '' ?> value="7"> 7
							<script type="text/javascript">
								function k_<?= $no_2 ?>(radio) {
									var name = parseInt(radio.value);
									var no = <?= $no_2 ?>;
									$.ajax({
										url: "<?php echo base_url('Pelamar/Ujian/save_kontrak_psikologis'); ?>",
										data: {
											name: name,
											no: no,
										},
										type: "post",
										async: true,
										dataType: 'json'
									});
								}
							</script>
						</td>

						<td><?= $key_2->soal ?></td>

						<td><?php
							$cek = $this->db->query("SELECT * FROM tb_data_jawaban_kontrak_psikologis WHERE no='" . ($no_2 + 17) . "' AND id_lowongan='$idLowongan' AND id_pelamar='$id_pelamar'")->result();
							?>
							<input class="form-check-input" id='jawaban<?= ($no_2 + 17) ?>' name="jawaban<?= ($no_2 + 17) ?>" type="radio" onclick="k_<?= ($no_2 + 17) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '1' ? 'checked' : '' : '' ?> value="1"> 1
							<input class="form-check-input" id='jawaban<?= ($no_2 + 17) ?>' name="jawaban<?= ($no_2 + 17) ?>" type="radio" onclick="k_<?= ($no_2 + 17) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '2' ? 'checked' : '' : '' ?> value="2"> 2
							<input class="form-check-input" id='jawaban<?= ($no_2 + 17) ?>' name="jawaban<?= ($no_2 + 17) ?>" type="radio" onclick="k_<?= ($no_2 + 17) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '3' ? 'checked' : '' : '' ?> value="3"> 3
							<input class="form-check-input" id='jawaban<?= ($no_2 + 17) ?>' name="jawaban<?= ($no_2 + 17) ?>" type="radio" onclick="k_<?= ($no_2 + 17) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '4' ? 'checked' : '' : '' ?> value="4"> 4
							<input class="form-check-input" id='jawaban<?= ($no_2 + 17) ?>' name="jawaban<?= ($no_2 + 17) ?>" type="radio" onclick="k_<?= ($no_2 + 17) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '5' ? 'checked' : '' : '' ?> value="5"> 5
							<input class="form-check-input" id='jawaban<?= ($no_2 + 17) ?>' name="jawaban<?= ($no_2 + 17) ?>" type="radio" onclick="k_<?= ($no_2 + 17) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '6' ? 'checked' : '' : '' ?> value="6"> 6
							<input class="form-check-input" id='jawaban<?= ($no_2 + 17) ?>' name="jawaban<?= ($no_2 + 17) ?>" type="radio" onclick="k_<?= ($no_2 + 17) ?>(this)" <?= !empty($cek) ? $cek[0]->jawaban == '7' ? 'checked' : '' : '' ?> value="7"> 7
							<script type="text/javascript">
								function k_<?= ($no_2 + 17) ?>(radio) {
									var name = parseInt(radio.value);
									var no = <?= ($no_2 + 17) ?>;
									$.ajax({
										url: "<?php echo base_url('Pelamar/Ujian/save_kontrak_psikologis'); ?>",
										data: {
											name: name,
											no: no,
										},
										type: "post",
										async: true,
										dataType: 'json',
									});
								}
							</script>
						</td>

					</tr>
				<?php $no_2++;
				} ?>
			</table>



		</div>

	</div>



</div>



<!-- <div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin-top: 20px;">

	<input style="margin-bottom: 2%" type="submit" class="btn btn-primary mr-2 mb-2" value="Selanjutnya"></a>

</div> -->

</form>


<!-- <script type="text/javascript">
	var total_r = 0;
	var total_s = 0;

	function calc_r(radio)

	{

		var value = parseInt(radio.value);



		if (radio.checked)

			total_r = value;

		// else

		// total_r -= value;



		document.getElementById("result_input").value = total_r;

	}

	function calc_i(checkbox)

	{

		var value = parseInt(checkbox.value);



		if (checkbox.checked)

			total_i += value;

		else

			total_i -= value;



		document.getElementById("hasil_i").value = total_i;

	}
</script> -->







<script type="text/javascript">
	var countDownDate = new Date("<?php echo $timekontrakpsikologis ?>").getTime();



	// Update the count down every 1 second

	var x = setInterval(function() {



		// Get today's date and time

		var now = new Date().getTime();



		// Find the distance between now and the count down date

		var distance = countDownDate - now;



		// Time calculations for days, hours, minutes and seconds

		var days = Math.floor(distance / (1000 * 60 * 60 * 24));

		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

		var seconds = Math.floor((distance % (1000 * 60)) / 1000);



		// Display the result in the element with id="demo"

		document.getElementById("time").innerHTML = hours + " : " + minutes + " : " + seconds + " ";



		// If the count down is finished, write some text

		if (distance < 0) {

			clearInterval(x);

			// document.getElementById("time").innerHTML = "EXPIRED";

			alert('Waktu mengerjakan ujian kontrak psikologis sudah habis');

			window.location.href = '<?php echo base_url('Pelamar/Pelamar/testulispsikotes'); ?>';

		}

	}, 1000);
</script>



<?php $this->load->view('layout3/footer') ?>