<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div style="color: white; background: black; padding: 10px; font-size: 16px;">
    DEBUG: Level Pengguna Saat Ini Adalah: "<?php var_dump($this->session->userdata('ses_idLevel')); ?>"
  </div>
  <?php 
  $perusahaan = $this->session->userdata('ses_id');
  $logoPerusahaan = 'default.png';

  if (!empty($perusahaan)) {
    $image = $this->db->query("SELECT * FROM tb_perusahaan WHERE id_perusahaan = ?", array($perusahaan));
    if ($image->num_rows() > 0) {
      foreach ($image->result() as $key) {
        $logoPerusahaan = $key->logo_perusahaan;
      }
    }
  }
  ?>
  <div class="app-sidebar__user"><img width="25%" class="app-sidebar__user-avatar" src="<?php echo ($logoPerusahaan != '' ? base_url('./upload/logo_perusahaan/' . $logoPerusahaan) : base_url('./upload/logo_perusahaan/default.png')); ?>" alt="User Image">
    <div>
      <p class="app-sidebar__user-name"><?php echo $this->session->userdata('ses_nama') ?></p>
      <p class="app-sidebar__user-designation"><?php echo $this->session->userdata('ses_idLevel') ?></p>
    </div>
  </div>
  <ul class="app-menu">
    <?php if ($this->session->userdata('ses_idLevel') == 'Administrator') { ?>
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Welcome" && $this->uri->segment(3) == "") {
           echo "active"; } ?>" href="<?php echo base_url('Administrator/Welcome') ?>">
           <i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span>
      </a>
    </li>
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_lowongan") { 
        echo "active"; } ?>" href="<?php echo base_url('Administrator/Data_lowongan') ?>">
        <i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Lowongan Kerja</span>
      </a>
    </li>
    <!-- <li><a class="app-menu__item  <?php if ($this->uri->segment(2) == "Data_motlet") {
      echo "active";
    } ?>" href="<?php echo base_url('Administrator/Data_motlet') ?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Motivation Letter </span></a></li> -->
    <!--  <li><a class="app-menu__item  <?php if ($this->uri->segment(2) == "Data_jadwal") {
      echo "active";
    } ?>" href="<?php echo base_url('Administrator/Data_jadwal') ?>"><i class="app-menu__icon fa fa-calendar-check-o"></i><span class="app-menu__label">Jadwal Seleksi </span></a></li> -->
    <li>
      <a class="app-menu__item  <?php if ($this->uri->segment(2) == "Data_nilai") {
        echo "active"; } ?>" href="<?php echo base_url('Administrator/Data_nilai/') ?>">
        <i class="app-menu__icon fa fa-wpforms"></i><span class="app-menu__label">Nilai Pelamar </span>
      </a>
    </li>
    <li>
      <a class="app-menu__item  <?php if ($this->uri->segment(2) == "Data_nilai") {
        echo "active"; } ?>" href="<?php echo base_url('Administrator/Quiz/') ?>">
        <i class="app-menu__icon fa fa-quora"></i><span class="app-menu__label">Quiz </span>
      </a>
    </li>
    <li class="treeview <?php if ($this->uri->segment(2) == "Data_Pelatihan") { echo "is-expanded"; } ?>"> 
      <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">Talent Test</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Paket/') ?>">
            <i class="icon fa fa-circle-o"></i> Kelola Paket Talent Test
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "admin_berkas") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/TalentTest/admin_berkas') ?>">
            <i class="icon fa fa-circle-o"></i> Kelola Berkas Talent Test
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "index") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/KuponTalentTest/index') ?>">
            <i class="icon fa fa-circle-o"></i> Kelola Kupon Talent Test
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "pendaftar") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_Pelatihan/pendaftar') ?>">
            <i class="icon fa fa-circle-o"></i> Data Pendaftar
          </a>
        </li>
      </ul>
    </li>
    <!-- <li><a class="app-menu__item  <?php if ($this->uri->segment(2) == "Data_ujian") {
      echo "active";
    } ?>" href="<?php echo base_url('Administrator/Data_ujian/') ?>"><i class="app-menu__icon fa fa-clipboard"></i><span class="app-menu__label">Ujian </span></a></li> -->
    <li class="treeview <?php if ($this->uri->segment(2) == "Data_ujian") { echo "is-expanded"; } ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-clock-o"></i>
        <span class="app-menu__label">Waktu Ujian</span><i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu" style="overflow-y: auto;">
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "") { echo "active";} ?>" 
            href="<?php echo base_url('Administrator/Data_ujian') ?>">
            <i class="icon fa fa-circle-o"></i> CFIT
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_ist") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_ist') ?>">
            <i class="icon fa fa-circle-o"></i> IST
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_papi") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_papi') ?>">
            <i class="icon fa fa-circle-o"></i> Papikostik
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_holland") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_holland') ?>">
            <i class="icon fa fa-circle-o"></i> Holland
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_skd") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_skd') ?>">
            <i class="icon fa fa-circle-o"></i> SKD
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_cepat") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_cepat') ?>">
            <i class="icon fa fa-circle-o"></i> Cepat Teliti
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_tray") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_tray') ?>">
            <i class="icon fa fa-circle-o"></i> In-Tray
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_disc") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_disc') ?>">
            <i class="icon fa fa-circle-o"></i> DISC
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_essay") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_essay') ?>">
            <i class="icon fa fa-circle-o"></i> Essay
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_hitung") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_hitung') ?>">
            <i class="icon fa fa-circle-o"></i> Hitung
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_kasus") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_kasus') ?>">
            <i class="icon fa fa-circle-o"></i> Studi Kasus
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_kasus2") { echo "active"; } ?>"
            href="<?php echo base_url('Administrator/Data_ujian/ujian_kasus2') ?>">
            <i class="icon fa fa-circle-o"></i> Studi Kasus Admin BSI
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_kasus_m") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_kasus_m') ?>">
            <i class="icon fa fa-circle-o"></i> Studi Kasus Manajerial
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_kasus_ldg") { echo "active"; } ?>"
            href="<?php echo base_url('Administrator/Data_ujian/ujian_kasus_ldg') ?>">
            <i class="icon fa fa-circle-o"></i> Studi Kasus LGD
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_leadership") { echo "active";} ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_leadership') ?>">
            <i class="icon fa fa-circle-o"></i> Leadership
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_msdt") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_msdt') ?>">
            <i class="icon fa fa-circle-o"></i> MSDT
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_rmib_pria") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_rmib_pria') ?>">
            <i class="icon fa fa-circle-o"></i> RMIB Pria
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_rmib_wanita") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_rmib_wanita') ?>">
            <i class="icon fa fa-circle-o"></i> RMIB Wanita
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_studibank") { echo "active"; } ?>"
            href="<?php echo base_url('Administrator/Data_ujian/ujian_studibank') ?>">
            <i class="icon fa fa-circle-o"></i> Studi Kasus Bank
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_talent") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_talent') ?>">
            <i class="icon fa fa-circle-o"></i> Talent
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_army") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_army') ?>">
            <i class="icon fa fa-circle-o"></i>Army
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_tkp") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_tkp') ?>">
            <i class="icon fa fa-circle-o"></i> TKP
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_inggris") { echo "active"; } ?>"
            href="<?php echo base_url('Administrator/Data_ujian/ujian_inggris') ?>">
            <i class="icon fa fa-circle-o"></i> Bahasa Inggris
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_tkb_accounting") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_tkb_accounting') ?>">
            <i class="icon fa fa-circle-o"></i> TKB - Accounting Staff
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_tkb_bussinessdevelopment") { echo "active";
            } ?>" href="<?php echo base_url('Administrator/Data_ujian/ujian_tkb_bussinessdevelopment') ?>">
            <i class="icon fa fa-circle-o"></i> TKB - Business Development Staff
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_tkb_trainingoperation") { echo "active";
            } ?>" href="<?php echo base_url('Administrator/Data_ujian/ujian_tkb_trainingoperation') ?>">
            <i class="icon fa fa-circle-o"></i> TKB - Training Operation Staff
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_tkb_projectadministration") { echo "active";
            } ?>" href="<?php echo base_url('Administrator/Data_ujian/ujian_tkb_projectadministration') ?>">
            <i class="icon fa fa-circle-o"></i> TKB - Project Administration Staff
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_tkb_frontliner"){ echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_tkb_frontliner') ?>">
            <i class="icon fa fa-circle-o"></i> TKB - Frontliner Staff
          </a>
        </li>                            
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_tpa") { echo "active"; } ?>"
            href="<?php echo base_url('Administrator/Data_ujian/ujian_tpa') ?>">
            <i class="icon fa fa-circle-o"></i> TPA
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_tpa2") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_tpa2') ?>">
            <i class="icon fa fa-circle-o"></i>TPA 2
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_belbin") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_belbin') ?>">
            <i class="icon fa fa-circle-o"></i> Belbin Tes
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_grafis") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_grafis') ?>">
            <i class="icon fa fa-circle-o"></i> Tes Grafis 1 & 2
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_kontrak_psikologis") { echo "active"; } ?>"
            href="<?php echo base_url('Administrator/Data_ujian/ujian_kontrak_psikologis') ?>">
            <i class="icon fa fa-circle-o"></i> Kontrak Psikologis
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "ujian_epps") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Data_ujian/ujian_epps') ?>">
            <i class="icon fa fa-circle-o"></i> EPPS
          </a>
        </li>
      </ul>
    </li>
    <li class="treeview <?php if ($this->uri->segment(1) == "Soal") { echo "is-expanded"; } ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i>
        <span class="app-menu__label">Bank Soal</span><i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "Soal_cfit" || $this->uri->segment(2) == "Soal_cfit") {
            echo "active"; } ?>" href="<?php echo base_url('Soal/Soal_cfit') ?>">
            <i class="icon fa fa-circle-o"></i> CFIT
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(2) == "Soal_ist") { echo "active"; } ?>" 
            href="<?php echo base_url('Soal/Soal_ist') ?>"><i class="icon fa fa-circle-o"></i> IST
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(2) == "Soal_papi") { echo "active"; } ?>" 
            href="<?php echo base_url('Soal/Soal_papi') ?>"><i class="icon fa fa-circle-o"></i> Papikostik
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(2) == "Soal_epps") { echo "active"; } ?>" 
            href="<?php echo base_url('Soal/Soal_epps') ?>"><i class="icon fa fa-circle-o"></i> Epps
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(2) == "Soal_inggris") { echo "active"; } ?>" 
            href="<?php echo base_url('Soal/Soal_inggris') ?>"><i class="icon fa fa-circle-o"></i> Bahasa Inggris
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(2) == "Soal_tkb_accounting") { echo "active"; } ?>" 
            href="<?php echo base_url('Soal/Soal_tkb_accounting') ?>"><i class="icon fa fa-circle-o"></i> 
            TKB - Accounting Staff
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(2) == "Soal_tkb_bussiness_development") { echo "active"; } ?>" 
            href="<?php echo base_url('Soal/Soal_tkb_bussiness_development') ?>"><i class="icon fa fa-circle-o"></i> 
            TKB - Business Development Staff
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(2) == "Soal_tkb_training_operation") { echo "active"; } ?>" 
            href="<?php echo base_url('Soal/Soal_tkb_training_operation') ?>"><i class="icon fa fa-circle-o"></i> 
            TKB - Training Operation Staff
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(2) == "Soal_tkb_project_administration") { echo "active"; } ?>" 
            href="<?php echo base_url('Soal/Soal_tkb_project_administration') ?>"><i class="icon fa fa-circle-o"></i> 
            TKB - Project Administration Staff
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(2) == "Soal_tpa") { echo "active"; } ?>" 
            href="<?php echo base_url('Soal/Soal_tpa') ?>"><i class="icon fa fa-circle-o"></i> TPA
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="app-menu__item  <?php if ($this->uri->segment(3) == "data_faq" || 
        $this->uri->segment(3) == "tambahdata_faq" || $this->uri->segment(3) == "edit_faq") { echo "active"; } ?>" 
        href="<?php echo base_url('Administrator/Welcome/data_faq') ?>">
        <i class="app-menu__icon fa fa-question-circle-o"></i><span class="app-menu__label">FAQ</span>
      </a>
    </li>
    <li class="treeview <?php if ($this->uri->segment(3) == "data_level" || $this->uri->segment(3) == "data_admin" || 
      $this->uri->segment(3) == "data_perusahaan" || $this->uri->segment(3) == "data_psikolog" || 
      $this->uri->segment(3) == "data_pelamar") { echo "is-expanded"; } ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i>
        <span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_level") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_level') ?>"><i class="icon fa fa-circle-o"></i> 
            Level
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_admin") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_admin') ?>">
            <i class="icon fa fa-circle-o"></i> Admin
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_perusahaan") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_perusahaan') ?>"><i class="icon fa fa-circle-o"></i> 
            Perusahaan
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_psikolog") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_psikolog') ?>"><i class="icon fa fa-circle-o"></i> 
            Psikolog
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_pelamar") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_pelamar') ?>">
            <i class="icon fa fa-circle-o"></i> Pelamar
          </a>
        </li>
        <li>
          <a class="app-menu__item <?php if ($this->uri->segment(2) == "sync_login_sso") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/sync_login_sso') ?>">
            <i class="app-menu__icon fa fa-wpforms"></i><span class="app-menu__label">Sync SSO Login </span>
          </a>
        </li>
      </ul>
    </li>
    <?php } else if ($this->session->userdata('ses_idLevel') == 'Admin Sdm') { ?>
    <li>
      <a class="app-menu__item  <?php if ($this->uri->segment(2) == "Dashboard") { echo "active"; } ?>" 
        href="<?php echo base_url('Administrator/Welcome') ?>"><i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li>
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_lowongan") { echo "active"; } ?>" 
        href="<?php echo base_url('Administrator/Data_lowongan') ?>"><i class="app-menu__icon fa fa-th-list"></i>
        <span class="app-menu__label">Lowongan Kerja</span>
      </a>
    </li>
    <!-- <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_motlet") {
      echo "active";
    } ?>" href="<?php echo base_url('Administrator/Data_motlet') ?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Motivation Letter </span></a></li> -->
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_jadwal") { echo "active"; } ?>" 
        href="<?php echo base_url('Administrator/Data_jadwal') ?>"><i class="app-menu__icon fa fa-calendar-check-o"></i>
        <span class="app-menu__label">Jadwal Seleksi </span>
      </a>
    </li>
    <!-- <li><a class="app-menu__item <?php if ($this->uri->segment(3) == "nilai_pelamar") {
      echo "active";
    } ?>" href="<?php echo base_url('Administrator/Data_nilai/nilai_pelamar') ?>"><i class="app-menu__icon fa fa-wpforms"></i><span class="app-menu__label">Nilai Pelamar </span></a></li> -->
    <li class="treeview <?php if ($this->uri->segment(3) == "data_level" || $this->uri->segment(3) == "data_admin" || 
      $this->uri->segment(3) == "data_perusahaan" || $this->uri->segment(3) == "data_psikolog" || 
      $this->uri->segment(3) == "data_pelamar") { echo "is-expanded"; } ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i>
        <span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_level") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_level') ?>"><i class="icon fa fa-circle-o"></i> Level
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_admin") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_admin') ?>"><i class="icon fa fa-circle-o"></i> Admin
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_perusahaan") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_perusahaan') ?>"><i class="icon fa fa-circle-o"></i> 
            Perusahaan
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_psikolog") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_psikolog') ?>"><i class="icon fa fa-circle-o"></i> 
            Psikolog
          </a>
        </li>
        <li>
          <a class="treeview-item <?php if ($this->uri->segment(3) == "data_pelamar") { echo "active"; } ?>" 
            href="<?php echo base_url('Administrator/Welcome/data_pelamar') ?>"><i class="icon fa fa-circle-o"></i> 
            Pelamar
          </a>
        </li>
      </ul>
    </li>
    <?php } else if ($this->session->userdata('ses_idLevel') == 'Psikolog') { ?>
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Welcome") { echo "active"; } ?>" 
        href="<?php echo base_url('Administrator/Welcome') ?>"><i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li>
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_lowongan") { echo "active"; } ?>" 
        href="<?php echo base_url('Psikolog/Data_lowongan') ?>"><i class="app-menu__icon fa fa-th-list"></i>
        <span class="app-menu__label">Lowongan Kerja</span>
      </a>
    </li>
    <!-- <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_jadwal") {
      echo "active";
    } ?>" href="<?php echo base_url('Psikolog/Data_jadwal') ?>"><i class="app-menu__icon fa fa-calendar-check-o"></i><span class="app-menu__label">Jadwal Seleksi </span></a></li> -->
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_nilai") { echo "active"; } ?>" 
        href="<?php echo base_url('Psikolog/Data_nilai') ?>"><i class="app-menu__icon fa fa-wpforms"></i>
        <span class="app-menu__label">Nilai Pelamar </span>
      </a>
    </li>
    <?php } else if ($this->session->userdata('ses_idLevel') == 'Perusahaan') {
      $ses_id = $this->session->userdata('ses_id');
      $id = $ses_id; // Langsung gunakan $ses_id, tidak perlu query
    ?>
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Dashboard") { echo "active"; } ?>" 
        href="<?php echo base_url('Perusahaan/Dashboard') ?>"><i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li>
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_lowongan") { echo "active"; } ?>" 
        href="<?php echo base_url('Perusahaan/Data_lowongan/lowongan/' . $id) ?>">
        <i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Lowongan Kerja</span>
      </a>
    </li>
    <!-- <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_jadwal") {
      echo "active";
    } ?>" href="<?php echo base_url('Perusahaan/Data_jadwal/jadwal/' . $id) ?>"><i class="app-menu__icon fa fa-calendar-check-o"></i><span class="app-menu__label">Jadwal Seleksi </span></a></li> -->
    <li>
      <a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_nilai") { echo "active"; } ?>" 
        href="<?php echo base_url('Perusahaan/Data_nilai/data_lowongan_nilai/' . $id) ?>">
        <i class="app-menu__icon fa fa-wpforms"></i><span class="app-menu__label">Nilai Pelamar </span>
      </a>
    </li>
    <?php
    } ?>
  </ul>
</aside>
<!-- end sidebar menu -->