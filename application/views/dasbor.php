<?php   $this->load->view('layout3/header') ?>

<?php   $this->load->view('layout3/navbar') ?>

<?php   $this->load->view('layout3/sidebar') ?>



<div class="col-sm-9 col-sm-offset-4 col-lg-10 col-lg-offset-2 main">

	<div class="row">

		<ol class="breadcrumb">

			<li><a href="#">

				<em class="fa fa-home color-amber"></em>

			</a></li>

			<li class="active">Dashboard</li>

		</ol>

	</div><!--/.row-->





	<!-- Notif -->

	<div class="row" style="background-color:white;">

		<div class="col-lg-12">

			<br>

			<!-- <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Welcome to the admin dashboard panel bootstrap template <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div> -->

			<?php 

			$ses_id = $this->session->userdata('ses_id');

			$data_diri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $ses_id");

			if ($data_diri->num_rows()>0) { ?>

				<div id="notifikasi" class="alert bg-info" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Selamat Datang di sistem choise chaakra <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>

			<?php } else{?>

				<div class="alert bg-info" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Selamat Datang di sistem choise chaakra, <b><a href="<?php echo base_url('Pelamar/Pelamar/tambahdatadiri') ?>">Segera lengkapi data diri anda </b></a></div>

			<?php } ?>



			<?php 

			$data_pendidikan = $this->db->query("SELECT * FROM tb_data_pendidikan WHERE id_pelamar = $ses_id");

			if ($data_pendidikan->num_rows()>0) {



			} else{?>

				<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Selamat Datang di sistem choise chaakra, <b><a href="<?php echo base_url('Pelamar/Pelamar/tambahdatakeluarga') ?>">Segera lengkapi data pendidikan anda </b></a></div>

			<?php } ?>



			<?php 

			$data_keluarga = $this->db->query("SELECT * FROM tb_data_keluarga WHERE id_pelamar = $ses_id");

			if ($data_keluarga->num_rows()>0) {



			} else{?>

				<div class="alert bg-warning" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Selamat Datang di sistem choise chaakra, <b>Segera lengkapi data keluarga anda </b> <a href="#" class="pull-right"></a></div>

			<?php } ?>



			<?php 

			$data_pengalaman = $this->db->query("SELECT * FROM tb_data_pengalaman_kerja WHERE id_pelamar = $ses_id");

			if ($data_pengalaman->num_rows()>0) {



			} else{?>

				<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Selamat Datang di sistem choise chaakra, <b>Segera lengkapi data pengalaman anda </b> <a href="#" class="pull-right"></a></div>

			<?php } ?>

		</div>
		
		<!--<h1 class="p1" align="center" style="background-color:red;"><b>PENGUMUMAN (Khusus Pelamar PT.UTAMA)</b></h1>
		<p  class="p1"><b>Berikut ini adalah jadwal pelaksanaan seleksi. Silahkan untuk dipantau tanggal-tanggalnya dan jangan sampai ketinggalan informasi. (Hanya kandidat yang sudah terseleksi administrasi saja dan dipanggil untuk ikut tes).</b></p> 
		<img src="<?php echo base_url('assets2/images/final.jpeg') ?>"alt="Images" class="center" >
		<b class="p2">Keterangan :</b>
		<p class="p2">1. Tanggal-tanggal diatas <b>TIDAK BERLAKU</b> bagi kandidat yg tidak dipanggil oleh tim seleksi.</p>
		<p class="p2">2. Tanggal-tanggal diatas bersifat <b>tentatif (dapat berubah sewaktu-waktu dengan pemberitahuan dari tim seleksi).</b></p>
		<p class="p2">3. Keputusan seleksi adalah <b>MUTLAK dan tidak bisa diganggu-gugat.</b></p>
		<p class="p2">4. Bagi kandidat yang <b>DIPANGGIL wajib mengikuti prosedur dan tata laksana tim seleksi.</b></p>
		<p class="p2">5. Apabila kandidat <b>tidak mengikuti salah satu dari proses di atas akan dianggap GUGUR.</b></b></p> 
		
	</div>/.row-->	

	<!-- ENd Notif -->



	<div class="row">

		<div class="col-lg-12">

			<h1 class="page-header align">Dasbor</h1>	

		</div>

	</div><!--/.row-->



	<div class="panel panel-container">

		<div class="row">

				<!-- <div class="col-xs-6 col-md-4 col-lg-4 no-padding">

					<div class="panel panel-teal panel-widget border-right">

						<div class="row no-padding"><em class="fa fa-xl fa-file color-blue"></em>

							<div class="large">1</div>

							<div class="text-muted"><a href="<?php  echo base_url('Home/ujian') ?>">Ujian Terjadwal</a></div>

						</div>

					</div>

				</div> -->

				<center>

					<div class="col-xs-6 col-md-4 col-lg-4 no-padding">

						<div class="panel panel-blue panel-widget border-right">

							<div class="row no-padding"><em class="fa fa-xl fa-suitcase color-orange"></em>
								<!-- Udated by Tobi 3 Feb 2021 -->
								<!-- mengubah query -->

								<?php 

								$query_low = $this->db->query("SELECT count(id_lowongan) AS jumlah FROM tb_lowongan WHERE jadwal_seleksi >= CURRENT_DATE()");

								$result = $query_low->result_array();

								?>

								<div class="large"><?php echo $result[0]['jumlah'] ?></div>

								<div class="text-muted"><a href="<?php  echo base_url('Pelamar/Lamaran/lowongantersedia') ?>">Lowongan Tersedia</a></div>

							</div>

						</div>

					</div>

					<div class="col-xs-6 col-md-4 col-lg-4 no-padding">

						<div class="panel panel-orange panel-widget border-right">

							<div class="row no-padding"><em class="fa fa-xl fa-envelope color-teal"></em>

								<?php 

								$query_low = $this->db->query("SELECT count(id_apply) AS jumlah FROM tb_apply WHERE id_pelamar = $ses_id");

								$result = $query_low->result_array();

								?>

								<div class="large"><?php echo $result[0]['jumlah'] ?></div>

								<div class="text-muted"><a href="<?php  echo base_url('Pelamar/Lamaran/lamaransaya') ?>">Lamaran Saya</a></div>

							</div>

						</div>

					</div>

					<div class="col-xs-6 col-md-4 col-lg-4 no-padding">

						<div class="panel panel-red panel-widget ">

							<div class="row no-padding"><em class="fa fa-xl fa-bullhorn color-red"></em>

								<!-- Edited by Tobi 3 Feb 2021 -->
								<!-- Mengubah query -->

								<?php 

								$query_low = $this->db->query("SELECT count(id_apply) AS jumlah FROM tb_apply WHERE id_pelamar = $ses_id AND (status_lamaran = 'Diterima'|| status_lamaran = 'Tidak lolos')");

								$result = $query_low->result_array();

								?>

								<div class="large"><?php echo $result[0]['jumlah'] ?></div>

								<div class="text-muted"><a href="<?php  echo base_url('Pelamar/Pengumuman/pengumuman2/') ?>">Hasil Seleksi</a></div>

							</div>

						</div>

					</div>

					<div class="col-xs-12 col-md-12 col-lg-12">

						<div class="panel panel-red panel-widget">

							<div class="row no-padding">

								<h4>Jika ada pertanyaan bisa hubungi kontak dibawah:</h4>

								<div class="medium"><em class="fa fa-md fa-phone color-black"></em> WhatsApp: +6285648200701</div>

								<div class="medium"><em class="fa fa-md fa-at color-black"></em> Email: adm@chaakraconsulting.com</div>

							</div>

						</div>

					</div>

				</center>

			</div><!--/.row-->

		</div>



	</div>	<!--/.main-->



	<?php   $this->load->view('layout3/footer') ?>