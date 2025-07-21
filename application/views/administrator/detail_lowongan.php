<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <?php foreach ($array as $key) {
        $id_pelamar = $this->session->userdata('ses_id');
        $lowongan = $this->db->query("SELECT * FROM tb_lowongan");
        foreach ($lowongan->result() as $key_lowongan) {
          if ($key_lowongan->id_lowongan == $key['id_lowongan']) {
            $lowongan1 = $key_lowongan->nama_jabatan; ?>
          <?php } ?>
        <?php } ?>
      <?php } ?>
      <h1><i class="fa fa-th-list"></i> Data Pelamar Lowongan</b></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Detail Lowongan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg') ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_update')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg_update') ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_hapus')) : ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('msg_hapus') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="tile-body">
          <div class="table-responsive">

            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th rowspan="2" class="align-middle">No</th>
                  <th rowspan="2" class="align-middle">Nama Pelamar</th>
                  <th rowspan="2" class="align-middle">Status Lamaran</th>
                  <th rowspan="2" class="align-middle">Status Keikutsertaan Ujian Online</th>
                  <th colspan="4" class="align-middle">Aksi</th>
                </tr>
                <tr>
                  <th class="align-middle">Lihat</th>
                  <th class="align-middle">Status Lowongan</th>
                  <th class="align-middle">Status Ujian</th>
                  <th class="align-middle">Download</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                $no = 1;
                foreach ($array as $key) { ?>
                  <tr>
                    <td class="align-middle"><?php echo $no; ?></td>
                        <td class="align-middle"><?php echo $key['nama_pelamar'] ?></td>
                    <?php
                    if ($key['status_lamaran'] == "Belum ada tindakan") {
                      $badges = 'badge badge-pill badge-warning';
                    } else if ($key['status_lamaran'] == "Tidak lolos") {
                      $badges = 'badge badge-pill badge-danger';
                    } else {
                      $badges = 'badge badge-pill badge-primary';
                    }
                    if ($key['status_ujian'] == 'tidak_aktif') {
                      $badges2 = 'badge badge-pill badge-danger';
                    } else {
                      $badges2 = 'badge badge-pill badge-primary';
                    }
                    ?>
                    <td class="align-middle"><span class="<?php echo $badges ?>"><?php echo $key['status_lamaran'] ?></span></td>
                    <td class="align-middle"><span class="<?php echo $badges2 ?>"><?php echo $key['status_ujian'] == 'aktif' ? 'Aktif' : 'Tidak Aktif'; ?></span></td>
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lihat Data Pelamar" type="button" class="btn btn-primary"><a style="color: #fff" href="<?php echo base_url('Pelamar/Data_pelamar/detail_pelamar/' . $key['id_pelamar']) ?>"><i class="fa fa-eye"></i></a></button>&nbsp;
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Terima Lamaran" type="button" class="btn btn-success"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/terima_pelamar/' . $key['id_apply']) ?>"><i class="fa fa-check"></i></a></button>&nbsp;
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tolak Lamaran" type="button" class="btn btn-danger"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/tolak_pelamar/' . $key['id_apply']) ?>"><i class="fa fa-times"></i></a></button>&nbsp;
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Aktifkan" type="button" class="btn btn-success"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/update_keikutsertaan_ujian/' . $key['id_apply'] . '/' . $key['id_lowongan'] . '/aktif') ?>"><i class="fa fa-check"></i></a></button>&nbsp;
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nonaktifkan" type="button" class="btn btn-danger"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/update_keikutsertaan_ujian/' . $key['id_apply'] . '/' . $key['id_lowongan'] . '/tidak_aktif') ?>"><i class="fa fa-times"></i></a></button>&nbsp;
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Download ZIP " type="button" class="btn btn-warning"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/download_zip/' . $key['id_pelamar'] . '/' . $key['id_lowongan'] . '/' . $no) ?>"><i class="fa fa-download"> ZIP</i></a></button>
                      </div>
                    </td>
                  </tr>
                <?php $modal++;
                  $no++;
                } ?>
              </tbody>
            </table>
            <div class="text-center mt-4">
                <?= $pagination ?>
            </div>
          </div>
        </div>
        <br>
        <?php if (isset($key['id_lowongan'])) {
        ?>
          <div class="align-right">
            <button data-toggle="tooltip" data-placement="bottom" title="" type="button" class="btn btn-success"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/update_all_apply/' . $key['id_lowongan'] . '/terima_semua_lamaran') ?>">Terima Semua Lamaran</button>
            <button data-toggle="tooltip" data-placement="bottom" title="" type="button" class="btn btn-danger"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/update_all_apply/' . $key['id_lowongan'] . '/tolak_semua_lamara_tidak_ada_tindakan') ?>">Tolak Lamaran Belum Ada Tindakan</button>
            <button data-toggle="tooltip" data-placement="bottom" title="" type="button" class="btn btn-success"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/update_all_apply/' . $key['id_lowongan'] . '/aktifkan_semua_keikutsertaan_ujian') ?>">Aktifkan Semua Keikutsertaan Ujian</button>
            <button data-toggle="tooltip" data-placement="bottom" title="" type="button" class="btn btn-danger"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/update_all_apply/' . $key['id_lowongan'] . '/nonaktifkan_semua_keikutsertaan_ujian') ?>">Nonaktifkan Semua Keikutsertaan Ujian</button>
          </div>
        <?php } ?>
      </div>
    </div>
</main>
<?php $this->load->view('layout/footer'); ?>