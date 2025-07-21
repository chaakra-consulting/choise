<?php   $this->load->view('layout3/header') ?>
<?php   $this->load->view('layout3/navbar') ?>
<?php   $this->load->view('layout3/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-envelope color-amber"></em>
			</a></li>
			<li class="active">Tes Wawasan Kebangsaan</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Tes Wawasan Kebangsaan</h1>
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
		foreach ($skd as $key) {
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

		foreach ($skdU as $key_s) {
			$nama_u = $key_s['nama_ujian'];
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
				</tbody>
			</table>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-12" style="background-color: #000000; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
				<h4 style="color: #fff;"><b>Peraturan Ujian!</b></h4>
				<li style="color: #fff;">Pada Tes Wawasan Kebangsaan ini akan terdapat 8 macam subtes.</li>
				<li style="color: #fff;">Persubtes akan diberi waktu selama 15 Menit.</li>
				<li style="color: #fff;">Pilihlah jawaban yang Anda anggap benar.</li>
				<li style="color: #fff;">Anda tidak bisa kembali ke subtes sebelumnya jika sudah dilewati, pastikan dulu jawaban sudah terisi semua sebelum lanjut ke subtes berikutnya.</li>
				</div>
		</div>
		<?php $idUjian = $this->session->userdata('ses_ujian'); ?>
		<div class="col-sm-12 button-lm-tittle justify-content-center text-center" style="margin: 10px;">
		<a href="<?php  echo base_url('Pelamar/Ujian/start_ujian_skd1/' . $idUjian.'/1') ?>" class="btn btn-primary mr-2 mb-2">Mulai Ujian </a>
		</div>
	</div>

</div>
</div><!--/.row-->
</div>	<!--/.main-->

<?php   $this->load->view('layout3/footer') ?>