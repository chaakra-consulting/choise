<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="profile-sidebar">
		<div class="profile-userpic">
			<?php
			$is_talent_test = $this->session->userdata('talent_test_user_id');
			$is_pelamar = $this->session->userdata('ses_id');
		
			if ($is_talent_test && !$is_pelamar) {
				$user_id = $this->session->userdata('talent_test_user_id');
				$user_data = $this->db->where('id_pendaftar_pelatihan', $user_id)->get('tb_pendaftar_pelatihan')->row();
				if ($user_data) {
					$user = $user_data;
					$imageUser = '';
					$nama_user = $user->nama_pendaftar_pelatihan;
					$status_user = 'Talent Test User';
				}
			} elseif (!$is_talent_test && $is_pelamar) {
				$id_pelamar = $this->session->userdata('ses_id');
				$image_data = $this->db->where('id_pelamar', $id_pelamar)->get('tb_pelamar')->row();
				if ($image_data) {
					$imageUser = $image_data->foto;
				}
				
				$ses_id = $this->session->userdata('ses_id');
				$ses_user = $this->session->userdata('ses_user');
				$pelamar_data = $this->db->where('id_pelamar', $ses_id)->get('tb_data_diri')->row();
				if ($pelamar_data) {
					$nama_user = $pelamar_data->nama_pelamar;
				} else {
					$nama_user = $ses_user;
				}
				$status_user = $this->session->userdata('ses_idLevel');
			} elseif ($is_talent_test && $is_pelamar) {
				$current_url = current_url();
				if (strpos($current_url, 'talent-test') !== false) {
					$user_id = $this->session->userdata('talent_test_user_id');
					$user_data = $this->db->where('id_pendaftar_pelatihan', $user_id)->get('tb_pendaftar_pelatihan')->row();
					if ($user_data) {
						$user = $user_data;
						$imageUser = '';
						$nama_user = $user->nama_lengkap;
						$status_user = 'Talent Test User';
					}
					$is_talent_test = true;
					$is_pelamar = false;
				} else {
					$id_pelamar = $this->session->userdata('ses_id');
					$image_data = $this->db->where('id_pelamar', $id_pelamar)->get('tb_pelamar')->row();
					if ($image_data) {
						$imageUser = $image_data->foto;
					}
					
					$ses_id = $this->session->userdata('ses_id');
					$ses_user = $this->session->userdata('ses_user');
					$pelamar_data = $this->db->where('id_pelamar', $ses_id)->get('tb_data_diri')->row();
					if ($pelamar_data) {
						$nama_user = $pelamar_data->nama_pelamar;
					} else {
						$nama_user = $ses_user;
					}
					$status_user = $this->session->userdata('ses_idLevel');
					$is_talent_test = false;
					$is_pelamar = true;
				}
			}
			?>
			<img src="<?php 
				if ($is_talent_test) {
					echo base_url('./upload/foto_pelamar/default.png');
				} elseif ($is_pelamar) {
					echo ($imageUser != '' ? base_url('./upload/foto_pelamar/' . $imageUser) : base_url('./upload/foto_pelamar/default.png'));
				} else {
					echo base_url('./upload/foto_pelamar/default.png');
				}
			?>" class="img-responsive" alt="">
		</div>
		
		<div class="profile-usertitle">
			<div class="profile-usertitle-name"><?php echo isset($nama_user) ? $nama_user : 'User'; ?></div>
			<div class="profile-usertitle-status"><?php echo isset($status_user) ? $status_user : 'Unknown'; ?></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="divider"></div>
	
	<ul class="nav menu">
		<?php if ($is_talent_test): ?>
			<li class="<?php if ($this->uri->segment(2) == "talent-test" && $this->uri->segment(3) == "dashboard") { echo "active"; } ?>">
				<a href="<?php echo base_url('talent-test/dashboard') ?>">
					<em class="fa fa-dashboard">&nbsp;</em> Dashboard
				</a>
			</li>
			<li class="<?php if ($this->uri->segment(2) == "talent-test" && $this->uri->segment(3) == "berkas") { echo "active"; } ?>">
				<a href="<?php echo base_url('talent-test/berkas') ?>">
					<em class="fa fa-file">&nbsp;</em> Berkas
				</a>
			</li>
			<!-- <li class="<?php if ($this->uri->segment(2) == "talent-test" && $this->uri->segment(3) == "start-exam") { echo "active"; } ?>">
				<a href="<?php echo base_url('talent-test/start-exam/cfit') ?>">
					<em class="fa fa-brain">&nbsp;</em> Mulai Ujian
				</a>
			</li> -->
			<li class="<?php if ($this->uri->segment(2) == "talent-test" && $this->uri->segment(3) == "exam-results") { echo "active"; } ?>">
				<a href="<?php echo base_url('talent-test/exam-results') ?>">
					<em class="fa fa-folder-open">&nbsp;</em> Hasil Ujian
				</a>
			</li>
			<!-- <li>
				<a href="<?php echo base_url('Home/talent_test') ?>">
					<em class="fa fa-arrow-left">&nbsp;</em> Kembali ke Beranda
				</a>
			</li> -->
			
		<?php elseif ($is_pelamar): ?>
			<li class="<?php if ($this->uri->segment(3) == "Dashboard") { echo "active"; } ?>">
				<a href="<?php echo base_url('Pelamar/Pelamar/Dashboard') ?>">
					<em class="fa fa-dashboard">&nbsp;</em> Dasbor
				</a>
			</li>
			<li class="<?php if ($this->uri->segment(3) == "profilawal" || $this->uri->segment(3) == "tambahdatadiri" || 
				$this->uri->segment(3) == "tambahdatakeluarga") { echo "active"; } ?>">
				<a href="<?php echo base_url('Pelamar/Pelamar/profilawal') ?>">
					<em class="fa fa-user">&nbsp;</em> Profil Saya
				</a>
			</li>
			<li class="<?php if ($this->uri->segment(3) == "lowongantersedia") { echo "active"; } ?>">
				<a href="<?php echo base_url('Pelamar/Lamaran/lowongantersedia') ?>">
					<em class="fa fa-suitcase">&nbsp;</em> Lowongan Tersedia
				</a>
			</li>
			<li class="<?php if ($this->uri->segment(3) == "vdownload_doc") { echo "active"; } ?>">
				<a href="<?php echo base_url('Pelamar/Pelamar/vdownload_doc') ?>">
					<em class="fa fa-file">&nbsp;</em> Download Dokumen
				</a>
			</li>
			<li class="<?php if ($this->uri->segment(3) == "uploadberkas") { echo "active"; } ?>">
				<a href="<?php echo base_url('Pelamar/Pelamar/uploadberkas') ?>">
					<em class="fa fa-paperclip">&nbsp;</em> Upload Berkas
				</a>
			</li>
			<li class="<?php if ($this->uri->segment(3) == "lamaransaya" || $this->uri->segment(2) == "Pengumuman") { echo "active"; } ?>">
				<a href="<?php echo base_url('Pelamar/Lamaran/lamaransaya') ?>">
					<em class="fa fa-envelope">&nbsp;</em> Lamaran Saya
				</a>
			</li>
		<?php endif; ?>
		
		<li>
			<a href="<?php 
				if ($is_talent_test) {
					echo base_url('talent-test/login');
				} elseif ($is_pelamar) {
					echo base_url('Login_pelamar/logout');
				} else {
					echo base_url('Home');
				}
			?>">
				<em class="fa fa-sign-out">&nbsp;</em> 
				<?php echo $is_talent_test ? 'Kembali' : 'Keluar'; ?>
			</a>
		</li>
	</ul>
</div>