<?php $this->load->view('layout3/header') ?>
<style>
	.text-truncate-2 {
		display: -webkit-box;
		-webkit-line-clamp: 1;
		/* Limits the text to 2 lines */
		-webkit-box-orient: vertical;
		overflow: hidden;
		text-overflow: ellipsis;
		/* Optional: Set a fixed line-height to ensure perfect vertical alignment */
		line-height: 1.2em;
		max-height: 2.4em;
		/* line-height * 2 */
	}
</style>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('layout3/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<em class="fa fa-envelope color-amber"></em>
				</a>
			</li>
			<li class="active">Lamaran Saya</li>
		</ol>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Lamaran Saya</h1>
		</div>
	</div>
	<!--/.row-->
	<div class="row align-items-stretch">
		<?php
		$id_pelamar = $this->session->userdata('ses_id');
		$apply = $this->db->query("SELECT * FROM tb_apply WHERE id_pelamar = $id_pelamar");
		$lowongan = $this->db->query("SELECT * FROM tb_lowongan");
		$perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");
		foreach ($apply->result() as $key) {
			$id_lowongan = $key->id_lowongan;
			$status_lamaran = $key->status_lamaran;
			$status_ujian = $key->status_ujian;
			$id_apply = $key->id_apply;
			foreach ($lowongan->result() as $key_lowongan) {
				if ($key_lowongan->id_lowongan == $id_lowongan) {
					$id_perusahaan = $key_lowongan->id_perusahaan;
					$nama_lowongan = $key_lowongan->nama_jabatan;
					$lowtersedia = $key_lowongan->status;

					foreach ($perusahaan->result() as $key_perusahaan) {
						if ($key_perusahaan->id_perusahaan == $id_perusahaan) {
							$nama_perusahaan = $key_perusahaan->nama_perusahaan;
							$logo_perusahaan = $key_perusahaan->logo_perusahaan;
						}
					}
				}
			}
		?>
			<div class="col-md-6 col-lg-3 mb-4 d-flex" data-aos="fade-up">

				<div class="unit-4 d-flex flex-column w-100 h-100 p-4 shadow-sm bg-white rounded">

					<div class="card-img-block mb-3 d-flex align-items-center justify-content-center" style="height: 120px;">
						<img style="max-height: 100%; max-width: 130px; object-fit: contain;" class="card-img-top"
							src="<?php echo (!empty($logo_perusahaan) ? base_url('./upload/logo_perusahaan/' . $logo_perusahaan) : base_url('./upload/logo_perusahaan/img_default.jpg')); ?>" alt="Logo">
					</div>

					<h3 class="h5 font-weight-bold mb-2 text-truncate-2" title="<?= $nama_lowongan ?>">
						<?= $nama_lowongan ?>
					</h3>

					<p class="text-muted mb-4 text-truncate-2"><?= $nama_perusahaan ?></p>
					<?php if ($lowtersedia == "tersedia") { ?>
						<?php if ($status_lamaran == "Diterima" && $status_ujian == "aktif") { ?>
							<!--<div>
							<a href="<?php echo base_url('Pelamar/Lamaran/jadwalseleksi/' . $id_lowongan) ?>" class="btn btn-primary btn-block mr-2 mb-2">Lihat Jadwal</a>
						</div>-->
							<div class="mt-auto w-100">
								<a href="<?php echo base_url('Pelamar/Pelamar/ujian/' . $id_lowongan) ?>" class="btn btn-primary btn-block mr-2 mb-2">Ujian Saya</a>
							</div>


						<?php }else if ($status_lamaran == "Ditolak") { ?>
						<div class="mt-auto w-100">
								<button href="#" disabled class="btn btn-primary btn-block mr-2 mb-2">Lamaran Ditolak</button>
							</div>
						<?php }else{ ?>
						<div class="mt-auto w-100">
								<button href="#" disabled class="btn btn-primary btn-block mr-2 mb-2">Proses Seleksi</button>
							</div>
						<?php }?>
						<?php $id_pelamar = $this->session->userdata('ses_id') ?>
						<!-- <div class="button-lm-tittle">
						<a href="<?php echo base_url('Pelamar/Pengumuman/pengumuman/' . $id_apply) ?>" class="btn btn-primary btn-block mr-2 mb-2">Pengumuman</a>
					</div> -->
					<?php }else{?>
						<div class="mt-auto w-100">
								<button href="#" disabled class="btn btn-primary btn-block mr-2 mb-2">Lamaran tidak Tersedia</button>
							</div>
					<?php } ?>

				</div>
			</div>
		<?php
		} ?>
	</div>
</div>
<!--/.row-->
</div>
<!--/.main-->

<?php $this->load->view('layout3/footer') ?>