<?php   $this->load->view('layout3/header') ?>
<?php   $this->load->view('layout3/navbar') ?>
<?php   $this->load->view('layout3/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li class="active">Tes Belbin</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Tes Belbin</h1>
		</div>
	</div><!--/.row-->

	<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
		<div class="col-sm-12">
			<h3><b>Konfirmasi Data</b></h3>
			<hr color="black">
		</div>
		<?php 
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		foreach ($belbin as $key) {
			$nik=$key['nik'];
			$nama=$key['nama_pelamar'];

			$lowongan=$this->db->query("SELECT * FROM tb_apply WHERE id_pelamar = $id_pelamar AND id_lowongan = $id_lowongan");
			$jabatan = $this->db->query("SELECT * FROM tb_lowongan WHERE id_lowongan = $id_lowongan");

			foreach ($lowongan->result() as $key_low) {
				$pelamar = $key_low->id_pelamar;
				$lowong = $key_low->id_lowongan;

				foreach ($jabatan->result() as $key_jab) {
					if ($key_low->id_lowongan == $key_jab->id_lowongan) {
						$nama_jabatan = $key_jab->nama_jabatan;
					}
				}
			}
		}

		foreach ($belbinU as $key_u) {
			$nama_u = $key_u['nama_ujian'];
			$durasi = $key_u['durasi'] / 60;
		}
		?>
		<div class="col-sm-12" style="margin-bottom: 5px;">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td><b>Nama Lengkap</b></td>
						<td><?php echo $nama ?></td>
					</tr>
					<tr>
						<td><b>NIK</b></td>
						<td><?php echo $nik ?></td>
					</tr>
					<tr>
						<td><b>Posisi Dilamar</b></td>
						<td><?php echo $nama_jabatan ?></td>
					</tr>
					<tr>
						<td><b>Nama Ujian</b></td>
						<td><?php echo $nama_u ?></td>
					</tr>
					<tr>
						<td><b>Waktu Pengerjaan</b></td>
						<td>35 Menit</td>
					</tr> 
				</tbody>
			</table>
		</div>
  <!--/.row-->
  <div class="col-sm-12" style="background-color: #000000; padding: 30px; border-radius: 5px; margin-bottom: 20px;">
    <h4 style="color: #ffffff" align="center"><b>INTRUKSI TES BELBIN</b></h4><br>
    <p style="color: #ffffff;">1. Dalam tes ini terdapat 7 Part soal yang didalamnya masing-masing terdapat 9 pernyataan yang berbeda-beda</p><br>
    <p style="color: #ffffff;">2. Tugas anda adalah memberikan nilai dalam bentuk poin (maksimal 10 poin per PART) pada masing-masing pernyataan yang disediakan sebagaimana kriteria berikut:
	<p style="color: #ffffff;">a. Semakin mendekati 10 poin, apabila anda “Setuju” dengan pernyataan
	tersebut</p><br>
	<p style="color: #ffffff;">b. Semakin mendekati 0 poin, apabila anda “Tidak Setuju” dengan pernyataan
	tersebut</p><br>
	<p style="color: #ffffff;">3. Perlu di ingat !! <b>per-Part anda hanya punya 10 poin (Bukan per-Pertanyaan/Soal), jika melebihi 10 poin maka akan mempengaruhi penilaian</b></p><br>
	<p style="color: #ffffff;">4. Tidak ada jawaban Benar/Salah dalam soal-soal ini dan silahkan diisi sesuai dengan
	kondisi sebenarnya yang anda miliki</p><br>
	<p style="color: #ffffff;">5.<b>Tunggu hingga waktu selesai untuk lanjut ke Part berikutnya.</b></p><br>

	</div>.
	</div>
		<?php $idUjian = $this->session->userdata('ses_ujian'); ?>
		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin: 10px;">
			<a href="<?php  echo base_url('Pelamar/Ujian/start_ujian_belbin/' . $idUjian.'/1') ?>" class="btn btn-primary mr-2 mb-2">Mulai Ujian </a>
		</div>
	</div>

</div>
</div>

<?php   $this->load->view('layout3/footer') ?>